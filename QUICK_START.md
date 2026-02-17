# Quick Start Guide

## Installation

### One-Line Install

**Linux/Mac:**
```bash
curl -s https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/install.sh | bash
```

**Windows (PowerShell):**
```powershell
irm https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/install.ps1 | iex
```

## What Gets Installed

1. **Laravel Command** - `app/Console/Commands/CursorRulesUpdate.php`
2. **Cursor Rules** - `.cursor/rules/*.mdc` (8 rule files)
3. **Pre-commit Hook** - `.git/hooks/pre-commit` (auto-updates)
4. **Version Files** - `.cursor/rules/laravel-cursor-rules-version.md` and manifest

## Usage

### Check for Updates
```bash
php artisan cursor:rules-update
```

### Force Update
```bash
php artisan cursor:rules-update --force
```

### Automatic Updates
Rules automatically update before each git commit (via pre-commit hook).

## File Structure

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
│       ├── laravel-cursor-rules-version.md    # Version tracking
│       └── laravel-cursor-rules-manifest.json # File manifest
└── .git/
    └── hooks/
        └── pre-commit                          # Auto-update hook
```

## How It Works

1. **Pre-commit hook runs** before each git commit
2. **Command checks** remote manifest for version
3. **Compares** local version vs remote version
4. **Downloads** updated rules if version differs
5. **Stages** updated rules automatically
6. **Commit proceeds** with latest rules

## Troubleshooting

### Command not found
```bash
# Clear Laravel cache
php artisan cache:clear
php artisan config:clear
```

### Pre-commit hook not running
```bash
# Make hook executable (Linux/Mac)
chmod +x .git/hooks/pre-commit

# Or reinstall
curl -o .git/hooks/pre-commit \
  https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/pre-commit
chmod +x .git/hooks/pre-commit
```

### Force reinstall everything
```bash
# Re-run installation script
curl -s https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/install.sh | bash
```

## Customization

### Disable Auto-Updates
Remove the pre-commit hook:
```bash
rm .git/hooks/pre-commit
```

You can still manually update:
```bash
php artisan cursor:rules-update
```

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
