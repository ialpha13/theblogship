# theblogship

A personal blog and portfolio site for networking and cybersecurity projects.

## Setup

1. Copy the example config and fill in your local database credentials:

   ```bash
   cp config.local.php.example config.local.php
   # Edit config.local.php with DB credentials
   ```

2. Import the database locally if you want sample data:

   ```bash
   mysql -u <user> -p < database.sql
   ```

3. Start your PHP server (or use WAMP/XAMPP):

   ```bash
   php -S localhost:8000 -t .
   ```

## Security notes

- `config.local.php` and `db.sql` are ignored by `.gitignore` to avoid leaking credentials or personal data.
- Use environment variables or `config.local.php` for database credentials.

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.
