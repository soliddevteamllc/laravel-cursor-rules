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

### 3. Install Pre-commit Hook (Optional)

Download the pre-commit hook to `.git/hooks/`:

```
Source: https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/pre-commit
Destination: .git/hooks/pre-commit
```

**Important:** Make the hook executable (Linux/Mac only):
```bash
chmod +x .git/hooks/pre-commit
```

### 4. Verify Installation

Check that rules were installed:

```bash
ls -la .cursor/rules/
```

You should see:
- 8 rule files (*.mdc)
- laravel-cursor-rules-manifest.json

## What Gets Installed

```
your-laravel-project/
├── app/
│   └── Console/
│       └── Commands/
│           └── CursorRulesUpdate.php          # Update command
├── .cursor/
│   └── rules/
│       ├── build-after-changes.mdc
│       ├── color-palette-usage.mdc
│       ├── english-naming-conventions.mdc
│       ├── icons-usage.mdc
│       ├── laravel-livewire-best-practices.mdc
│       ├── livewire-component-structure.mdc
│       ├── prefer-livewire-components.mdc
│       ├── responsive-design.mdc
│       └── laravel-cursor-rules-manifest.json
└── .git/
    └── hooks/
        └── pre-commit                          # (Optional)
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

### Automatic Updates (if pre-commit hook installed)
- Hook runs before each commit
- Downloads updates if available
- Blocks commit if rules changed (requires manual review)

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

### Re-download pre-commit hook
```bash
curl -o .git/hooks/pre-commit \
  https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/pre-commit
chmod +x .git/hooks/pre-commit
```

## Repository

https://github.com/soliddevteamllc/laravel-cursor-rules
