## Troubleshooting

### 1) App opens but CSS is missing / UI looks unstyled
Run:

```powershell
npm install
npm run build
```

If you are developing, run:

```powershell
npm run dev
```

### 2) Images (logo/profile picture) are not showing
Make sure the storage link exists:

```powershell
php artisan storage:link
```

Also confirm your upload uses the `public` disk (this project does).

### 3) After updating, list page still shows old data
Clear caches:

```powershell
php artisan optimize:clear
```

### 4) “Invalid dimensions” error on upload
Your image width/height is outside the allowed limits.
- Use a smaller image, or
- Change validation rules in the relevant Form Request file.

### 5) Database errors on migrate
#### MySQL
- Ensure MySQL is running
- Ensure the database exists
- Check `.env` DB credentials

#### SQLite
- Ensure `database/database.sqlite` exists
- Ensure `.env` has `DB_CONNECTION=sqlite`

### 6) Pagination links not visible
Pagination links only appear when you have **more than 10 records**.

