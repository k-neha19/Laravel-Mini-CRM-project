## Database Schema

### Tables

#### `companies`
Typical fields used in this project:
- `id` (PK)
- `name` (string, required)
- `email` (string, nullable)
- `website` (string, nullable)
- `logo` (string path, nullable)
- `created_at`, `updated_at`

#### `employees`
Fields used in this project (see migration `database/migrations/*create_employees_table.php`):
- `id` (PK)
- `first_name` (string, required)
- `last_name` (string, required)
- `company_id` (FK → `companies.id`, required)
- `email` (string, nullable)
- `phone` (string, nullable)
- `profile_picture` (string path, nullable)
- `created_at`, `updated_at`

### Relationships
- A **Company has many Employees**
- An **Employee belongs to a Company**

### Migrations
Run:

```powershell
php artisan migrate
```

Reset (delete and recreate all tables):

```powershell
php artisan migrate:fresh
```

