# Cursor AI Installation Prompt

Copy and paste this prompt to Cursor AI to install Laravel Cursor Rules in your project:

---

Please install Laravel Cursor Rules in this project by following these steps:

1. Read the installation instructions from:
   https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/INSTALL.md

2. Download the Laravel command file to `app/Console/Commands/CursorRulesUpdate.php` from:
   https://raw.githubusercontent.com/soliddevteamllc/laravel-cursor-rules/main/CursorRulesUpdate.php

3. Run the command to download all rules:
   ```bash
   php artisan cursor:rules-update
   ```

4. Add a step to the existing GitHub Actions deploy workflow to check Cursor rules are up to date. Add this step before deployment:
   ```yaml
   - name: Check Cursor Rules are up to date
     run: php artisan cursor:rules-update --check
   ```
   This will fail the pipeline if rules are outdated, forcing developers to update locally first.

5. Verify the installation by listing the `.cursor/rules/` directory.

6. Show me a summary of what was installed.

---

That's it! Cursor AI will handle the entire installation process.
