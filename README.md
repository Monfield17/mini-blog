# Mini Blog (PHP + MySQLi)

A simple PHP mini‑blog application built as a learning project.  
It demonstrates user authentication, CRUD operations, working with MySQLi, and basic project structure using OOP in PHP.

## Features

- User registration and login (password hashing)
- Session‑based authentication
- Create, read, update and delete blog posts
- Each post is linked to the logged‑in user
- Simple and clean UI
- Fully functional CRUD logic using MySQLi
- Secure prepared statements

## Technologies Used

- PHP 8+
- MySQL / MariaDB
- MySQLi (prepared statements)
- HTML + CSS
- XAMPP (local development)

## Project Structure

mini-blog/
│
├── public/
│   ├── login.php
│   ├── register.php
│   ├── dashboard.php
│   ├── posts.php
│   ├── post_create.php
│   ├── post_edit.php
│   ├── post_delete.php
│   └── assets/
│       └── style.css
│
├── src/
│   ├── Database.php
│   ├── User.php
│   └── Post.php
│
├── config/
│   └── config.php   (NOT included in GitHub)
│
└── README.md


## How to Run the Project

1. Clone the repository  
2. Create a MySQL database (e.g. `mini-blog`)
3. Import the SQL schema (users + posts tables)
4. Create `config/config.php` with your DB credentials:

```php
<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mini-blog"; ```

5. Start Apache + MySQL (XAMPP)

6. Open in browser:

http://localhost/mini-blog/public/login.php

Future Improvements
User roles (admin / user)

Comments under posts

Image upload for posts

Pagination

CSRF protection

Password reset

