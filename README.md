# Laravel Cursor Rules

A collection of Cursor AI rules for Laravel + Livewire projects that automatically sync and stay up to date.

## 📁 Repository Structure

```
laravel-cursor-rules/
├── laravel-cursor-rules-manifest.json         # Version and file list
├── CursorRulesUpdate.php                      # Laravel command
├── install.sh                                 # Linux/Mac installer
├── install.ps1                                # Windows installer
├── pre-commit                                 # Git hook
└── .cursor/
    └── rules/
        ├── build-after-changes.mdc                    # Build process rules
        ├── color-palette-usage.mdc                    # Color standards
        ├── english-naming-conventions.mdc             # Naming standards
        ├── icons-usage.mdc                            # Icon usage
        ├── laravel-livewire-best-practices.mdc        # Livewire best practices
        ├── livewire-component-structure.mdc           # Component structure
        ├── prefer-livewire-components.mdc             # Component preferences
        └── responsive-design.mdc                      # Responsive design rules
```

## 🚀 Quick Start

### Automated Installation (Recommended)

**Linux/Mac:**
```bash
curl -s https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/install.sh | bash
```

**Windows (PowerShell):**
```powershell
irm https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/install.ps1 | iex
```

### Manual Installation

1. Download the command file:
   ```bash
   curl -o app/Console/Commands/CursorRulesUpdate.php \
     https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php
   ```

2. Run the update command:
   ```bash
   php artisan cursor:rules-update
   ```

3. (Optional) Install pre-commit hook for auto-updates:
   ```bash
   curl -o .git/hooks/pre-commit \
     https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/pre-commit
   chmod +x .git/hooks/pre-commit
   ```

## 🔄 Auto-Update Feature

The Laravel command (`cursor:rules-update`) automatically:

1. **Checks for updates** using a manifest file
2. **Compares versions** between your local rules and the GitHub repository
3. **Downloads updates** if a new version is available
4. **Runs automatically** via pre-commit hook (optional)

### How It Works

**Manual Update:**
```bash
php artisan cursor:rules-update
```

**Automatic Updates (via pre-commit hook):**
- Runs before every git commit
- Checks for rule updates
- Downloads new rules if available
- Stages updated rules automatically

**Force Update:**
```bash
php artisan cursor:rules-update --force
```

## 📋 Available Rules

| Rule | Description |
|------|-------------|
| **build-after-changes.mdc** | Run `npm run build` after CSS/HTML changes |
| **color-palette-usage.mdc** | Project color palette standards |
| **english-naming-conventions.mdc** | English naming for all code |
| **icons-usage.mdc** | Icon library usage guidelines |
| **laravel-livewire-best-practices.mdc** | Livewire coding standards |
| **livewire-component-structure.mdc** | Component organization patterns |
| **prefer-livewire-components.mdc** | When to use Livewire components |
| **responsive-design.mdc** | Responsive design principles |

## 🛠️ Laravel Command

The `cursor:rules-update` command is installed in your project at:
```
app/Console/Commands/CursorRulesUpdate.php
```

### Command Features:

- ✅ Fetches manifest from GitHub
- ✅ Compares local vs remote version
- ✅ Downloads only changed files
- ✅ Progress bar for downloads
- ✅ Error handling and reporting
- ✅ Force update option

### Command Options:

```bash
# Check and update if needed
php artisan cursor:rules-update

# Force update regardless of version
php artisan cursor:rules-update --force
```

## 🔧 Customization

### Adding Your Own Rules

1. Create a new `.mdc` file in `.cursor/rules/`
2. Add frontmatter:
   ```yaml
   ---
   description: Your rule description
   alwaysApply: true  # or false for file-specific rules
   globs: **/*.php    # optional: file patterns
   ---
   ```
3. Write your rule content

### Disabling Auto-Update

To disable pre-commit auto-updates, remove the git hook:
```bash
rm .git/hooks/pre-commit
```

You can still manually update anytime with:
```bash
php artisan cursor:rules-update
```

## 📦 Version Management

- Current version is tracked in `laravel-cursor-rules-manifest.json`
- Version format: `v0.0.1`
- Manifest contains list of all rule files
- Increment version when publishing rule updates
- Projects check manifest to determine if updates are needed

### Updating Rules

1. Make changes to rule files in `.cursor/rules/`
2. Update version in `laravel-cursor-rules-manifest.json`
3. Commit and push changes
4. Projects will auto-detect and download updates

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Update `laravel-cursor-rules-version.md` (increment version)
5. Submit a pull request

## 📄 License

MIT License - feel free to use in your projects!

## 🔗 Links

- Repository: https://github.com/soliddevteamllc/laravel-cursor-rules
- Issues: https://github.com/soliddevteamllc/laravel-cursor-rules/issues
