#!/bin/bash

# Laravel Cursor Rules Installation Script
# This script sets up Cursor AI rules in your Laravel project

set -e

echo "🚀 Installing Laravel Cursor Rules..."

# Check if we're in a Laravel project
if [ ! -f "artisan" ]; then
    echo "❌ Error: This doesn't appear to be a Laravel project (artisan not found)"
    exit 1
fi

# Create .cursor/rules directory
echo "📁 Creating .cursor/rules directory..."
mkdir -p .cursor/rules

# Copy the command file
echo "📄 Installing cursor:rules-update command..."
mkdir -p app/Console/Commands
curl -s https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php -o app/Console/Commands/CursorRulesUpdate.php

# Run the update command to fetch initial rules
echo "📦 Downloading Cursor rules..."
php artisan cursor:rules-update

# Install pre-commit hook
echo "🔗 Installing pre-commit hook..."
mkdir -p .git/hooks
curl -s https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/pre-commit -o .git/hooks/pre-commit
chmod +x .git/hooks/pre-commit

echo ""
echo "✅ Installation complete!"
echo ""
echo "📋 What was installed:"
echo "   • app/Console/Commands/CursorRulesUpdate.php - Update command"
echo "   • .cursor/rules/ - Cursor AI rules"
echo "   • .git/hooks/pre-commit - Auto-update hook"
echo ""
echo "🔧 Usage:"
echo "   • php artisan cursor:rules-update        - Check for updates"
echo "   • php artisan cursor:rules-update --force - Force update"
echo ""
echo "💡 Rules will auto-update before each commit!"
