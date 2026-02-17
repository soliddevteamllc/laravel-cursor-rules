# Quick Start Guide

## Installation

### With Cursor AI (Recommended)

Copy and paste this to Cursor AI:

```
Please install Laravel Cursor Rules in this project by following these steps:

1. Read the installation instructions from:
   https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/INSTALL.md

2. Download the Laravel command file to app/Console/Commands/CursorRulesUpdate.php from:
   https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php

3. Run the command to download all rules:
   php artisan cursor:rules-update

4. Verify the installation by listing the .cursor/rules/ directory.

5. Show me a summary of what was installed.
```

### Manual Installation

```bash
# 1. Download command
curl -o app/Console/Commands/CursorRulesUpdate.php \
  https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php

# 2. Download rules
php artisan cursor:rules-update
```

## What Gets Installed

1. **Laravel Command** - `app/Console/Commands/CursorRulesUpdate.php`
2. **Cursor Rules** - `.cursor/rules/*.mdc` (multiple rule files)
3. **Manifest File** - `.cursor/rules/laravel-cursor-rules-manifest.json` (version tracking)

## Usage

### Check for Updates
```bash
php artisan cursor:rules-update
```

### Force Update
```bash
php artisan cursor:rules-update --force
```

### Check Version (CI/CD)
```bash
php artisan cursor:rules-update --check
```
Exits with code 0 if up to date, code 1 if outdated. Perfect for CI/CD pipelines.

## File Structure

```
your-laravel-project/
├── app/
│   └── Console/
│       └── Commands/
│           └── CursorRulesUpdate.php          # Update command
└── .cursor/
    └── rules/
        ├── *.mdc                               # Rule files (varies by version)
        └── laravel-cursor-rules-manifest.json # Version tracking & file list
```

## How It Works

1. **Command checks** remote manifest for version
2. **Compares** local version vs remote version
3. **Downloads** updated rules if version differs
4. **Updates** local manifest with new version

## Troubleshooting

### Command not found
```bash
# Clear Laravel cache
php artisan cache:clear
php artisan config:clear
```

### Re-download command
```bash
curl -o app/Console/Commands/CursorRulesUpdate.php \
  https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php
```

## Customization

### Add Custom Rules
1. Create `.mdc` file in `.cursor/rules/`
2. Add YAML frontmatter:
   ```yaml
   ---
   description: Your rule description
   alwaysApply: true
   ---
   ```
3. Write your rule content

## Support

- Repository: https://github.com/soliddevteamllc/laravel-cursor-rules
- Issues: https://github.com/soliddevteamllc/laravel-cursor-rules/issues
