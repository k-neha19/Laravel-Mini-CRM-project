## Validation & Uploads

### Form Request validation
This project uses Laravel Form Requests to validate input:

#### Companies
- `app/Http/Requests/StoreCompanyRequest.php`
- `app/Http/Requests/UpdateCompanyRequest.php`

#### Employees
- `app/Http/Requests/StoreEmployeeRequest.php`
- `app/Http/Requests/UpdateEmployeeRequest.php`

### Uploads (logo / profile picture)
Uploads are stored to the **public disk**:
- `storage/app/public/logos/*`
- `storage/app/public/profile_pictures/*`

To serve these files in the browser, you must run:

```powershell
php artisan storage:link
```

### Image validation rules (important)

#### Company logo
- Image type: jpeg/png/jpg
- Max file size: **1 MB**
- Dimensions:
  - Minimum: **100×100**
  - Maximum: **800×800**

#### Employee profile picture
- Image type: jpeg/png/jpg
- Max file size: **1 MB**
- Maximum dimensions: **3000×3000**

### Common upload issue
If you see “invalid dimensions”, it means the uploaded image width/height is outside the allowed range.

