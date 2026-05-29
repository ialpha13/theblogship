# The Blog Ship

[![License](https://img.shields.io/github/license/ialpha13/theblogship)](https://github.com/ialpha13/theblogship/blob/main/LICENSE) [![Issues](https://img.shields.io/github/issues/ialpha13/theblogship)](https://github.com/ialpha13/theblogship/issues) [![Last commit](https://img.shields.io/github/last-commit/ialpha13/theblogship)](https://github.com/ialpha13/theblogship/commits/main)

A personal blog and portfolio site focused on networking, routing protocols, and cybersecurity projects.

Live site: https://theblogship.example.com (replace with your URL)

## Features
- Portfolio and certificates section
- Articles and category-driven blog pages
- Lightweight PHP + PDO backend with CSRF protection
- Static assets (CSS/JS/images) organized under `assets/`

## Tech stack
- PHP 7.4+ (or compatible)
- MySQL / MariaDB
- Plain HTML/CSS/JS for frontend

## Quickstart (local)
1. Copy the local config template and edit credentials (this file is ignored by git):

```powershell
copy config.local.php.example config.local.php
# Edit config.local.php with your DB credentials
```

2. (Optional) Import sample data locally:

```powershell
mysql -u <user> -p < theblogship_db.sql
```

3. Run a local PHP server or use WAMP/XAMPP:

```powershell
php -S localhost:8000 -t .
```

4. Open `http://localhost:8000` in your browser.

## Configuration
- The project reads DB credentials from `config.local.php` (recommended) or environment variables: `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
- Do not commit secrets. `config.local.php` and `db.sql` are listed in `.gitignore`.

## Security & hardening
- Use strong, unique passwords for your database user.
- Run behind HTTPS in production and configure secure session cookies.
- Review `includes/contact_form.php` and other input handlers if you enable user input or uploads.

## Contributing
Feel free to open issues or pull requests. Guidelines:

- Keep commits small and focused.
- Do not include secrets or database dumps in PRs.

## License
This project is released under the MIT License. See `LICENSE` for details.

## Author
- Umair Khan (ialpha13) — iprouteumair@gmail.com

---
If you'd like, I can add a `CONTRIBUTING.md`, a basic `CODE_OF_CONDUCT.md`, or badges for CI and license.
