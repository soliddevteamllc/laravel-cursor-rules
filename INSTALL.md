# Laravel Cursor Rules - Installation Instructions

This file contains instructions for installing Laravel Cursor Rules in a Laravel project.

## Installation Steps

Follow these steps to install the Laravel Cursor Rules system:

### 1. Download the Laravel Command

Download `CursorRulesUpdate.php` to `app/Console/Commands/`:

```
Source: https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php
Destination: app/Console/Commands/CursorRulesUpdate.php
```

### 2. Run Initial Update

Execute the command to download all rules:

```bash
php artisan cursor:rules-update
```

This will:
- Create `.cursor/rules/` directory
- Download all rule files (*.mdc)
- Download the manifest file
- Set up version tracking

### 3. Verify Installation

Check that rules were installed:

```bash
ls -la .cursor/rules/
```

You should see:
- Multiple rule files (*.mdc)
- laravel-cursor-rules-manifest.json

## What Gets Installed

```
your-laravel-project/
├── app/
│   └── Console/
│       └── Commands/
│           └── CursorRulesUpdate.php          # Update command
└── .cursor/
    └── rules/
        ├── *.mdc                               # Rule files (varies by version)
        └── laravel-cursor-rules-manifest.json # Version & file list
```

## Usage After Installation

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

This command:
- Checks if rules are up to date
- Exits with code 0 if up to date
- Exits with code 1 if outdated
- Perfect for CI/CD pipelines

## Troubleshooting

### Command not found
```bash
php artisan cache:clear
php artisan config:clear
```

### Re-download command
```bash
curl -o app/Console/Commands/CursorRulesUpdate.php \
  https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php
```


## Repository

https://github.com/soliddevteamllc/laravel-cursor-rules
