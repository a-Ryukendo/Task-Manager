# Task Manager

A simple web-based Task Manager built with Laravel, MySQL, and Blade (Bootstrap for styling).

## Features
- User registration and login (session-based authentication)
- Create tasks with title and status
- View tasks grouped by status: To Do, In Progress, Done
- Update task status (To Do → In Progress → Done)
- Delete tasks
- Responsive UI using Bootstrap
- **Modern, clean UI:** Login, Register, and Dashboard pages are visually appealing and user-friendly, with cards, spacing, and icons.
- **Vue.js info box:** Dashboard includes a Vue-powered info box with usage instructions.

## Database Schema
- **users:** id, name, email, password
- **tasks:** id, title, status, user_id, created_at, updated_at

## Quick Start: How to Run This Project

### 1. Clone the Repository
```sh
git clone <repo-url>
cd Task_Manager
```

### 2. Install PHP & JS Dependencies
```sh
composer install
npm install
```

### 3. Set Up Database
- Create a new MySQL database for this project.
- Import the provided `database/task_manager.sql` file into your MySQL database:
  ```sh
  mysql -u your_mysql_username -p your_database_name < database/task_manager.sql
  ```
  Or use phpMyAdmin to import the SQL file.

### 4. Set Up Environment
- Copy `.env.example` to `.env`:
  ```sh
  cp .env.example .env
  ```
- Edit `.env` and set your database credentials:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_mysql_username
  DB_PASSWORD=your_mysql_password
  ```
  > **Note:** Replace `your_database_name`, `your_mysql_username`, and `your_mysql_password` with your own MySQL database name, username, and password.

### 5. Generate Application Key
```sh
php artisan key:generate
```

### 6. Serve the Application (Backend)
```sh
php artisan serve
```
Visit [http://localhost:8000](http://localhost:8000) in your browser.

### 7. Set Up and Run Vue.js Frontend (Vite)
- **Development:**
  ```sh
  npm run dev
  ```
  This will start the Vite dev server for hot-reloading Vue components and assets.
- **Production Build:**
  ```sh
  npm run build
  ```
  This will generate the production assets in `public/build`.

### 8. Register and Use
- Go to `/register` to create a user.
- Log in at `/login`.
- Use the dashboard to manage your tasks.

---

## Troubleshooting
- **APP_KEY error?**
  - Run `php artisan key:generate` and check that `APP_KEY` is set in `.env`.
- **403 Unauthorized on task actions?**
  - Only the owner of a task can update/delete it. Make sure you are logged in as the correct user.
- **Headers already sent error?**
  - Check for whitespace before `<?php` or after `?>` in PHP files. Output buffering is enabled in `public/index.php` as a safeguard.
- **Vite manifest not found?**
  - Run `npm run dev` for development or `npm run build` for production to generate frontend assets.

---

## Routes
- `GET /register` — Registration form
- `POST /register` — Register user
- `GET /login` — Login form
- `POST /login` — Login user
- `POST /logout` — Logout
- `GET /dashboard` — Task dashboard (grouped by status)
- `GET /tasks/create` — Add new task
- `POST /tasks` — Store new task
- `GET /tasks/{task}/edit` — Edit task status
- `PUT /tasks/{task}` — Update task status
- `DELETE /tasks/{task}` — Delete task

## Tech Stack
- Backend: Laravel (PHP)
- Frontend: Blade (Bootstrap 5), Vue.js (with Vite)
- Database: MySQL

---

Feel free to customize and extend this app for your needs!
