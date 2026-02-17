# Laravel Cursor Rules

A collection of Cursor AI rules for Laravel + Livewire projects that automatically sync and stay up to date.

## 📁 Repository Structure

```
laravel-cursor-rules/
├── README.md                              # Full documentation
├── INSTALL.md                             # Installation instructions
├── CURSOR_INSTALL_PROMPT.md               # Copy-paste prompt for Cursor AI
├── QUICK_START.md                         # Quick reference
├── laravel-cursor-rules-manifest.json     # Version + file list
├── CursorRulesUpdate.php                  # Laravel command
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

### Installation with Cursor AI (Recommended)

Simply copy and paste this prompt to Cursor AI:

> Please install Laravel Cursor Rules in this project by following these steps:
> 
> 1. Read the installation instructions from:
>    https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/INSTALL.md
> 
> 2. Download the Laravel command file to `app/Console/Commands/CursorRulesUpdate.php` from:
>    https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php
> 
> 3. Run the command to download all rules:
>    ```bash
>    php artisan cursor:rules-update
>    ```
> 
> 4. Verify the installation by listing the `.cursor/rules/` directory.
> 
> 5. Show me a summary of what was installed.

**Or use the pre-made prompt:**
See [CURSOR_INSTALL_PROMPT.md](CURSOR_INSTALL_PROMPT.md)

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

**Check Version (for CI/CD):**
```bash
php artisan cursor:rules-update --check
```
- Exits with code 0 if up to date
- Exits with code 1 if outdated
- Perfect for CI/CD pipelines

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
