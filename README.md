## Mini CRM (Laravel) — Companies & Employees

A simple CRM-style web app built using Laravel to manage **Companies** and their **Employees**.

### Why this project exists
- Practice a full CRUD application with a clean UI and authentication
- Learn Laravel resource routing, controllers, validation (Form Requests), pagination, file uploads, and database relations
- Demonstrate a complete “mini project” that can be set up and run locally

### Key features
- **Auth-protected dashboard** (Laravel Breeze)
- **Companies CRUD** (name, email, website, logo upload)
- **Employees CRUD** (first/last name, company, email, phone, profile picture upload)
- **Relationship**: Employee belongs to Company
- **Pagination**: 10 records per page for both lists
- **Validation**: form requests for create/update

### Documentation (full)
See the `project_documentation/` folder:
- `project_documentation/00_overview.md`
- `project_documentation/01_setup_and_run.md`
- `project_documentation/02_database_schema.md`
- `project_documentation/03_routes_and_pages.md`
- `project_documentation/04_validation_and_uploads.md`
- `project_documentation/05_troubleshooting.md`

## Requirements
- PHP **8.2+**
- Composer **2+**
- Node.js **18+** (recommended) + npm
- A database:
  - **MySQL** (recommended for your current setup), or
  - **SQLite** (easy local setup)

## Setup & Run (Windows / PowerShell)
Open PowerShell in the project folder.

### 1) Install dependencies

```powershell
composer install
npm install
```

### 2) Create `.env` and app key

```powershell
copy .env.example .env
php artisan key:generate
```

### 3) Configure database

#### Option A: MySQL
Edit `.env` and set:

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=your_db_name`
- `DB_USERNAME=your_username`
- `DB_PASSWORD=your_password`

Create the database in MySQL (example: `laravel_miniproject`) before migrating.

#### Option B: SQLite
Edit `.env` and set:

- `DB_CONNECTION=sqlite`

Then create the SQLite file:

```powershell
New-Item -ItemType File -Path "database\database.sqlite" -Force
```

### 4) Run migrations

```powershell
php artisan migrate
```

### 5) Link storage (for logos/profile pictures)

```powershell
php artisan storage:link
```

### 6) Build frontend assets

```powershell
npm run build
```

### 7) Start the app

Terminal 1:

```powershell
php artisan serve
```

Terminal 2 (optional, for hot reload during development):

```powershell
npm run dev
```

App URL (default):
- `http://127.0.0.1:8000`

## How to use
- Register/login
- Create a few **Companies**
- Add **Employees** and assign them to a company
- Use Edit/Delete actions from list pages

## Notes
- Pagination is set to **10 per page** in:
  - `app/Http/Controllers/CompanyController.php`
  - `app/Http/Controllers/EmployeeController.php`
- Uploaded images are stored under `storage/app/public/...` and served via `public/storage` (storage link required).



## Screenshots

### Companies
Companies Page
![alt text](<Screenshot (252).png>)
### Employees
Employees Page
<img width="1920" height="1080" alt="Screenshot (253)" src="https://github.com/user-attachments/assets/df66633f-9ddb-4601-9a87-df98234a8c18" />
<img width="1920" height="1080" alt="Screenshot (254)" src="https://github.com/user-attachments/assets/8ab59121-2bb3-402e-9ab6-1c49a5181d3e" />


### Edit Employee
Edit Employee Page
<img width="1920" height="1080" alt="Screenshot (255)" src="https://github.com/user-attachments/assets/71a162de-4f9e-4df2-944d-76c4c1250171" />
