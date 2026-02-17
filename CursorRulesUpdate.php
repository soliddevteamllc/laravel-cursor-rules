<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class CursorRulesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cursor:rules-update {--force : Force update even if version is the same}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Cursor AI rules from the remote repository';

    private const BASE_URL = 'https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main';
    private const RULES_DIR = '.cursor/rules';
    private const MANIFEST_FILE = 'laravel-cursor-rules-manifest.json';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('🔍 Checking for Cursor rules updates...');

        try {
            // Fetch remote manifest (contains list of files and version)
            $manifest = $this->fetchRemoteManifest();
            if (!$manifest) {
                $this->error('❌ Failed to fetch remote manifest');
                return self::FAILURE;
            }

            // Check local version
            $localVersion = $this->getLocalVersion();
            $remoteVersion = $manifest['version'] ?? null;

            if (!$remoteVersion) {
                $this->error('❌ Invalid manifest: missing version');
                return self::FAILURE;
            }

            // Compare versions
            if (!$this->option('force') && $localVersion === $remoteVersion) {
                $this->info("✅ Rules are already up to date: {$localVersion}");
                return self::SUCCESS;
            }

            // Show update info
            if ($localVersion) {
                $this->warn("📦 Updating rules: {$localVersion} → {$remoteVersion}");
            } else {
                $this->warn("📦 Installing rules: {$remoteVersion}");
            }

            // Create rules directory if it doesn't exist
            if (!File::isDirectory(base_path(self::RULES_DIR))) {
                File::makeDirectory(base_path(self::RULES_DIR), 0755, true);
            }

            // Download all rule files from manifest
            $this->downloadRuleFiles($manifest['files'] ?? []);

            // Download and save manifest locally
            $this->saveLocalManifest($manifest);

            $this->info("✅ Rules updated successfully to version: {$remoteVersion}");

            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error("❌ Error updating rules: {$e->getMessage()}");
            return self::FAILURE;
        }
    }

    /**
     * Fetch the remote manifest from GitHub
     */
    private function fetchRemoteManifest(): ?array
    {
        $url = self::BASE_URL . '/' . self::MANIFEST_FILE;

        $response = Http::timeout(10)->get($url);

        if (!$response->successful()) {
            return null;
        }

        return $response->json();
    }

    /**
     * Get the local version if it exists
     */
    private function getLocalVersion(): ?string
    {
        $manifestPath = base_path(self::RULES_DIR . '/' . self::MANIFEST_FILE);

        if (!File::exists($manifestPath)) {
            return null;
        }

        $manifest = json_decode(File::get($manifestPath), true);

        return $manifest['version'] ?? null;
    }

    /**
     * Download all rule files
     */
    private function downloadRuleFiles(array $files): void
    {
        if (empty($files)) {
            $this->warn('⚠️  No files to download');
            return;
        }

        $progressBar = $this->output->createProgressBar(count($files));
        $progressBar->start();

        $failed = [];

        foreach ($files as $file) {
            $url = self::BASE_URL . '/.cursor/rules/' . $file;
            $destination = base_path(self::RULES_DIR . '/' . $file);

            $response = Http::timeout(10)->get($url);

            if ($response->successful()) {
                File::put($destination, $response->body());
            } else {
                $failed[] = $file;
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine();

        if (!empty($failed)) {
            $this->warn('⚠️  Failed to download: ' . implode(', ', $failed));
        }
    }

    /**
     * Save the manifest locally
     */
    private function saveLocalManifest(array $manifest): void
    {
        $destination = base_path(self::RULES_DIR . '/' . self::MANIFEST_FILE);
        File::put($destination, json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
