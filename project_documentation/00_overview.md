## Project Overview — Mini CRM

### What this project is
This is a Laravel mini project to manage:
- **Companies**
- **Employees** (each employee belongs to a company)

The app provides a simple CRM-like interface to create, view, update, and delete records.

### Why it is implemented (learning goals)
- Understand **Laravel MVC** with resource controllers
- Use **Form Requests** for validation
- Work with **Eloquent relationships** (`Company` ↔ `Employee`)
- Implement **pagination** in list pages
- Upload and display images via **Laravel Storage**
- Protect pages using **authentication middleware**

### Main modules
- **Authentication**: Laravel Breeze (login/register)
- **Companies**: CRUD + logo upload
- **Employees**: CRUD + profile picture upload + assign to company

### UI pages
- `/companies` — companies list (paginated)
- `/employees` — employees list (paginated)
- create/edit/show pages for each module

