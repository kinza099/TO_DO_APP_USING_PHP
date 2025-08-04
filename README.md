# TO_DO_APP_USING_PHP

## Project Description

A web-based To-Do List application developed using PHP and MySQL. It allows users to manage their daily tasks by adding, marking as completed, and deleting tasks. The design is clean, simple, and fully responsive.

## Features

- Add new tasks.
- Mark tasks as completed.
- Delete tasks.
- Responsive and clean user interface.
- Auto-creation of Database and Table.
- Built with PHP & MySQL.

## Folder Structure

```
TO_DO_APP_USING_PHP/
├── index.php                # Main page to display tasks
├── add.php                  # Handles adding tasks
├── mark_done.php            # Marks tasks as done
├── delete.php               # Deletes tasks
├── db.php                   # Database connection & auto-create DB & Table
├── README.md                # Project documentation
└── /screenshots/            # Screenshots for README
    ├── screenshot1.png
    └── screenshot2.png
```

## Database Schema

```sql
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status ENUM('pending', 'completed') DEFAULT 'pending'
);
```

## Setup Instructions

1. Install **XAMPP**.
2. Start **Apache** and **MySQL** from XAMPP Control Panel.
3. Place the project folder inside `C:/xampp/htdocs/`.
4. Open **phpMyAdmin** (http://localhost/phpmyadmin).
5. No need to create a database manually, the app will auto-create the database and table.
6. Open browser and visit: `http://localhost/TO_DO_APP_USING_PHP/index.php`.
7. Start adding tasks.

## Screenshots

### Task List View

![Task List Screenshot](screenshots/screenshot1.png)### Add Task View

![Add Task Screenshot](screenshots/screenshot2.png)## Technologies Used

- PHP
- MySQL
- HTML
- CSS

## Author

Kinza099

## License

MIT License
