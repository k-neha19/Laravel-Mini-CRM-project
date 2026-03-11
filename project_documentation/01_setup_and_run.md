## Setup & Run Guide (Windows / PowerShell)

### Prerequisites
- PHP **8.2+**
- Composer **2+**
- Node.js **18+** (recommended) + npm
- Database: **MySQL** or **SQLite**

### Install dependencies

```powershell
composer install
npm install
```

### Environment file and app key

```powershell
copy .env.example .env
php artisan key:generate
```

### Database configuration

#### Option A — MySQL
1) Create a MySQL database (example name: `laravel_miniproject`)
2) Edit `.env`:

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=laravel_miniproject`
- `DB_USERNAME=...`
- `DB_PASSWORD=...`

#### Option B — SQLite
1) Edit `.env`:
- `DB_CONNECTION=sqlite`
2) Create SQLite DB file:

```powershell
New-Item -ItemType File -Path "database\database.sqlite" -Force
```

### Run migrations

```powershell
php artisan migrate
```

### Storage link (required for image display)

```powershell
php artisan storage:link
```

### Build assets

Production build:

```powershell
npm run build
```

Development hot reload (optional):

```powershell
npm run dev
```

### Run the application

```powershell
php artisan serve
```

Open:
- `http://127.0.0.1:8000`

### Common useful commands

Clear caches:

```powershell
php artisan optimize:clear
```

Re-run migrations from scratch (deletes all tables/data):

```powershell
php artisan migrate:fresh
```

