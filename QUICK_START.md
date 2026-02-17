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
4. **Manifest File** - `.cursor/rules/laravel-cursor-rules-manifest.json` (version tracking)

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
Pre-commit hook checks for updates before each commit. If rules are updated, the commit will be blocked so you can review changes first.

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
│       └── laravel-cursor-rules-manifest.json # Version tracking & file list
└── .git/
    └── hooks/
        └── pre-commit                          # Auto-update hook
```

## How It Works

1. **Pre-commit hook runs** before each git commit
2. **Command checks** remote manifest for version
3. **Compares** local version vs remote version
4. **Downloads** updated rules if version differs
5. **Blocks commit** if rules were updated
6. **You review** the changes in `.cursor/rules/`
7. **Stage and commit** after reviewing:
   ```bash
   git add .cursor/rules/
   git commit
   ```

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

### Commit blocked after rules update
This is expected behavior! Review the changes:
```bash
# See what changed
git diff .cursor/rules/

# If changes look good, stage them
git add .cursor/rules/

# Then commit
git commit
```

### Skip the pre-commit check
```bash
git commit --no-verify
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
