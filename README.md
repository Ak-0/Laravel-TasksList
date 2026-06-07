# Task List (Laravel) - Drag-and-Drop Table

A Laravel-based **Task List** application with CRUD operations and **drag-and-drop row sorting** in a table interface.

The app uses Livewire + SortableJS on the frontend and persists ordering in the database using a `sort_order` column.

---

## Features

- Create, edit, and delete tasks
- Table-based task listing
- Drag-and-drop task reordering (via `SORT` handle)
- Persisted ordering in database (`sort_order`)
- Laravel + Vite development workflow

---

## Tech Stack

- **PHP** `^8.3`
- **Laravel** `^13.8`
- **Database** SQLite (default) or MySQL/PostgreSQL
- **Frontend build** Vite `^8`
- **Styling** Tailwind CSS `^4`
- **Reordering package** `atomcoder/laravel-reorderable`
- **Drag-and-drop library** SortableJS (CDN)

---

## Project Structure (relevant files)

- `routes/web.php` - task routes
- `app/Models/Task.php` - task model + sortable contract/trait
- `resources/views/tasks/index.blade.php` - task list page
- `resources/views/livewire/livewire-sort-table.blade.php` - sortable table UI
- `database/migrations/*tasks*` - tasks and sort-order migrations

---

## Prerequisites

Make sure you have the following installed:

- PHP 8.3+
- Composer
- Node.js 18+ and npm
- SQLite (or another DB server if not using SQLite)

---

## Local Deployment / Setup

### 1) Clone project and enter directory

```bash
git clone <your-repo-url>
cd Ark0-tasks_list
```

### 2) Install PHP dependencies

```bash
composer install
```

### 3) Create environment file

```bash
cp .env.example .env
```

### 4) Generate app key

```bash
php artisan key:generate
```

### 5) Configure database

#### Option A: SQLite (quick local setup)

If you want SQLite, ensure your `.env` contains:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/tasks_list/laravel
```

In this repository, a SQLite file exists as:

```text
laravel
```

So for this project root, a working value is:

```env
DB_DATABASE=/tasks_list/laravel
```

#### Option B: MySQL (example)

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_list
DB_USERNAME=root
DB_PASSWORD=
```

### 6) Run migrations

```bash
php artisan migrate
```

### 7) Install frontend dependencies

```bash
npm install
```

### 8) Start the app (recommended combined dev command)

```bash
composer run dev
```

This runs:
- Laravel dev server
- Queue listener
- Laravel pail logs
- Vite dev server

Open the app at:

```text
http://127.0.0.1:8000
```

---

## Alternative Quick Setup

You can also use the predefined setup script:

```bash
composer run setup
```

It performs install + env setup + key generation + migrate + npm install + build.

Then run:

```bash
composer run dev
```

---

## Usage

1. Open home page (`/`) to see task table.
2. Create a task from `/tasks/create`.
3. Edit existing tasks from `EDIT` action.
4. Delete tasks from `DELETE` action.
5. Reorder tasks by dragging rows via the `SORT` button/handle.
6. Order is saved to `sort_order` and reflected on reload.

---

## Available Routes

- `GET /` -> task index
- `GET /tasks/create` -> create form
- `POST /tasks/update` -> store new task
- `GET /tasks/edit/{id}` -> edit form
- `POST /tasks/update/{id}` -> update task
- `GET /tasks/destroy/{id}` -> delete task
- `GET /tasks/sort` -> sorting endpoint route

---

## Testing and Validation

Run tests:

```bash
composer run test
```

Build frontend assets:

```bash
npm run build
```

---

## Troubleshooting

- **Vite assets not loading**
  - Ensure `npm run dev` is running.
- **App key missing**
  - Run `php artisan key:generate`.
- **Database errors**
  - Confirm `.env` DB settings and run `php artisan migrate`.
- **Drag-and-drop not working**
  - Check network console for SortableJS CDN loading issues.

---

## License

This project is based on Laravel and follows the MIT license terms from the Laravel ecosystem.
