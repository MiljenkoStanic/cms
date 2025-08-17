# PHP CMS Skeleton

This repository contains a minimal object-oriented CMS skeleton built with PHP 8.

## Features
- Basic MVC structure with simple router
- User authentication (register, login, logout)
- Language management with CRUD operations
- Translation storage model
- Bootstrap 5 based views

## Setup
1. Install dependencies:
   ```bash
   composer install
   ```
2. Create MySQL database and import `database/migrations/schema.sql`.
3. Configure database credentials in `config/config.php`.
4. Serve the `public` directory via PHP built-in server:
   ```bash
   php -S localhost:8000 -t public
   ```

This is a starting point for building a full-featured CMS.
