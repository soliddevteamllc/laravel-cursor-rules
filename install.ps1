# Laravel Cursor Rules Installation Script (PowerShell)
# This script sets up Cursor AI rules in your Laravel project

$ErrorActionPreference = "Stop"

Write-Host "🚀 Installing Laravel Cursor Rules..." -ForegroundColor Cyan

# Check if we're in a Laravel project
if (-not (Test-Path "artisan")) {
    Write-Host "❌ Error: This doesn't appear to be a Laravel project (artisan not found)" -ForegroundColor Red
    exit 1
}

# Create .cursor/rules directory
Write-Host "📁 Creating .cursor/rules directory..." -ForegroundColor Yellow
New-Item -ItemType Directory -Path ".cursor/rules" -Force | Out-Null

# Copy the command file
Write-Host "📄 Installing cursor:rules-update command..." -ForegroundColor Yellow
New-Item -ItemType Directory -Path "app/Console/Commands" -Force | Out-Null
Invoke-WebRequest -Uri "https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php" -OutFile "app/Console/Commands/CursorRulesUpdate.php" -UseBasicParsing

# Run the update command to fetch initial rules
Write-Host "📦 Downloading Cursor rules..." -ForegroundColor Yellow
php artisan cursor:rules-update

# Install pre-commit hook
Write-Host "🔗 Installing pre-commit hook..." -ForegroundColor Yellow
New-Item -ItemType Directory -Path ".git/hooks" -Force | Out-Null
Invoke-WebRequest -Uri "https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/pre-commit" -OutFile ".git/hooks/pre-commit" -UseBasicParsing

Write-Host ""
Write-Host "✅ Installation complete!" -ForegroundColor Green
Write-Host ""
Write-Host "📋 What was installed:" -ForegroundColor Cyan
Write-Host "   • app/Console/Commands/CursorRulesUpdate.php - Update command"
Write-Host "   • .cursor/rules/ - Cursor AI rules"
Write-Host "   • .git/hooks/pre-commit - Auto-update hook"
Write-Host ""
Write-Host "🔧 Usage:" -ForegroundColor Cyan
Write-Host "   • php artisan cursor:rules-update        - Check for updates"
Write-Host "   • php artisan cursor:rules-update --force - Force update"
Write-Host ""
Write-Host "💡 Rules will auto-update before each commit!" -ForegroundColor Yellow
