# Library Management System - Laravel Setup Guide

## Database Configuration

1. Update your `.env` file with your MySQL database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=lms
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. Run the migrations to create the database tables:
   ```bash
   php artisan migrate
   ```

3. (Optional) Create a default admin user:
   ```bash
   php artisan tinker
   ```
   Then run:
   ```php
   \App\Models\Admin::create(['username' => 'admin', 'password' => 'admin123']);
   ```

## Running the Application

1. Start the Laravel development server:
   ```bash
   php artisan serve
   ```

2. Open your browser and navigate to:
   ```
   http://localhost:8000
   ```

## Project Structure

- **Models**: `app/Models/` (Admin, Student, Book, IssuedBook)
- **Controllers**: `app/Http/Controllers/` (AuthController, AdminController, StudentController, BookController, IssuedBookController)
- **Views**: `resources/views/` (Blade templates organized by feature)
- **Routes**: `routes/web.php`
- **Migrations**: `database/migrations/`
- **Static Assets**: `public/` (style.css, library.jpg)

## Features

- Admin login and dashboard
- Book management (Add, Edit, Delete)
- Student registration and login
- Issue and return books
- Student dashboard to view and borrow books

## Notes

- All HTML and CSS from the original project has been preserved
- PHP code has been converted to Laravel controllers and Blade templates
- Database structure remains the same as the original project

