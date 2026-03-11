## Routes & Pages

### Route file
Routes are defined in:
- `routes/web.php`

### Auth protection
Companies and Employees are behind auth middleware:
- You must **login** to access `/companies` and `/employees`

### Resource routes
The project uses Laravel resource routes:
- `Route::resource('companies', CompanyController::class);`
- `Route::resource('employees', EmployeeController::class);`

This automatically creates these common routes:
- `index` (list)
- `create` (form)
- `store` (save new)
- `show` (details)
- `edit` (edit form)
- `update` (save changes)
- `destroy` (delete)

### Main pages
- `/companies`
  - List of companies (10 per page)
  - Actions: view/edit/delete
- `/employees`
  - List of employees (10 per page)
  - Includes company name via relationship
  - Actions: view/edit/delete

### Pagination
Pagination is implemented in the controllers using:
- `->paginate(10)`

And displayed in the views using:
- `{{ $companies->links() }}`
- `{{ $employees->links() }}`

