# Employee Management App CI4

A simple employee management application built using CodeIgniter 4 and MySQL.

## Features

- Authentication Login
- User Management (CRUD)
- Employee Management (CRUD)
- Upload Employee Photo
- Session Authentication
- Bootstrap 5 Admin Layout

## Tech Stack

- CodeIgniter 4
- PHP 8+
- MySQL
- Bootstrap 5
- XAMPP

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/khaerulroh25/employee_managemet_ci4.git
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Copy Environtment File

```bash
cp env .env
```

### 4. Configure Environment

Open .env file and change:

```bash
CI_ENVIRONMENT = development
```

### 5. Configure Database

Open:

```bash
app/Config/Database.php
```

Then Update:

```bash
public string $hostname = 'localhost';
public string $database = 'employee_management_ci4';
public string $username = 'root';
public string $password = '';
```

### 6. Create Database

```bash
employee_management_ci4
```

### 7. Run Migration

```bash
php spark migrate
```

### 8. Run Seeder

```bash
php spark db:seed UserSeeder
```

### 9. Run Development Server

```bash
php spark serve
```

### 10. Open Browser

```bash
http://localhost:8080
```

### Default Login

```bash
Email    : test@mail.com
Password : 25januari
```
