# Laravel Cursor Rules

A collection of Cursor AI rules for Laravel + Livewire projects that automatically sync and stay up to date.

## 📁 Repository Structure

```
laravel-cursor-rules/
├── laravel-cursor-rules-version.md    # Version tracking
└── .cursor/
    └── rules/
        ├── laravel-cursor-rules-install.mdc           # Auto-installer
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

### Option 1: Manual Installation

1. Copy the `.cursor` folder to your Laravel project root
2. Copy `laravel-cursor-rules-version.md` to your project root
3. The rules will auto-update at the start of each new Cursor conversation

### Option 2: Git Submodule (Recommended)

```bash
# Add as submodule
git submodule add https://github.com/soliddevteamllc/laravel-cursor-rules.git

# Copy files to your project
cp -r laravel-cursor-rules/.cursor .
cp laravel-cursor-rules/laravel-cursor-rules-version.md .

# Update submodule when needed
git submodule update --remote laravel-cursor-rules
```

## 🔄 Auto-Update Feature

The install rule (`laravel-cursor-rules-install.mdc`) automatically:

1. **Checks for updates** at the start of every new conversation
2. **Compares versions** between your local rules and the GitHub repository
3. **Downloads updates** if a new version is available
4. **Updates itself** to ensure the latest installation logic

### How It Works

```bash
# At conversation start, the AI agent:
1. Fetches remote version from GitHub
2. Compares with local version
3. If different: Downloads all rule files + install rule
4. If same: Proceeds silently
```

## 📋 Available Rules

| Rule | Description |
|------|-------------|
| **laravel-cursor-rules-install.mdc** | Auto-sync installer (runs automatically) |
| **build-after-changes.mdc** | Run `npm run build` after CSS/HTML changes |
| **color-palette-usage.mdc** | Project color palette standards |
| **english-naming-conventions.mdc** | English naming for all code |
| **icons-usage.mdc** | Icon library usage guidelines |
| **laravel-livewire-best-practices.mdc** | Livewire coding standards |
| **livewire-component-structure.mdc** | Component organization patterns |
| **prefer-livewire-components.mdc** | When to use Livewire components |
| **responsive-design.mdc** | Responsive design principles |

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

To disable auto-updates, remove or rename `laravel-cursor-rules-install.mdc`.

## 📦 Version Management

- Current version is tracked in `laravel-cursor-rules-version.md`
- Version format: `v0.0.1`
- Increment version when publishing rule updates
- Projects automatically sync when version changes

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
