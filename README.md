# 📦 Laravel REST API – Company & Employees Manager

A REST API built with Laravel for managing **companies** and their **employees**. Fully supports CRUD operations, request validation, API token authentication with Laravel Sanctum, and error logging..

---

## 🔧 Requirements

- PHP >= 8.1  
- Composer  
- Laravel >= 10  
- MySQL / PostgreSQL  
- Postman

---

## 🚀 Installation

```bash
git clone https://github.com/your-username/company-api.git
cd company-api

composer install

# Set your DB in .env

composer require laravel/breeze

php artisan breeze:install

# choose blade

# choose y

# choose 0

php artisan migrate

php -S localhost:9000 -t public/ 
```

---

## 🔐 Authentication (Laravel Sanctum)

This API uses **Sanctum tokens** for authorization.

### 🔑 How to get a token:

1. Visit `/register` or `/login` in browser.
2. Go to `/user/profile` to generate a token (via `$user->createToken()`).
3. Use that token in Postman under **Authorization → Bearer Token**.

```
Authorization: Bearer YOUR_API_TOKEN
```

---

## 🔗 API Endpoints

### 📁 Company

| Method | Endpoint                  | Description                        |
|--------|---------------------------|------------------------------------|
| GET    | `/api/companies`          | List all companies                 |
| GET    | `/api/companies/{id}`     | Get a single company + employees   |
| POST   | `/api/companies`          | Create a new company               |
| PUT    | `/api/companies/{id}`     | Update company details             |
| DELETE | `/api/companies/{id}`     | Delete a company                   |

### 👤 Employee

| Method | Endpoint                    | Description                       |
|--------|-----------------------------|-----------------------------------|
| GET    | `/api/employees`           | List all employees                |
| GET    | `/api/employees/{id}`      | Get a single employee + company   |
| POST   | `/api/employees`           | Create a new employee             |
| PUT    | `/api/employees/{id}`      | Update employee data              |
| DELETE | `/api/employees/{id}`      | Delete an employee                |

---

## ✅ Validation

Validation is handled via `FormRequest` classes. If validation fails, the response includes detailed messages:

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "nip": [
      "NIP already exists in DB!"
    ]
  }
}
```

---

## 🛠️ Error Handling

`update` and `delete` methods use `try-catch` blocks. Errors are logged in:

```
storage/logs/laravel.log
```

---

## 🧪 Testing with Postman

You can:

- Send requests to `/api/companies` and `/api/employees`
- Test validation errors
- Check response formats and error messages

---


## 📂 Project Structure

- `app/Http/Controllers` – Controllers  
- `app/Http/Requests` – Request validation  
- `app/Models` – Models  
- `routes/api.php` – API routes definition

---

## 📌 Notes

- `phone` is optional for employees  
- `nip` must be unique for each company
-  API requires token-based authentication for all requests.

---

## 👨‍💻 Author

Project created for recruitment process.

**Name**: Piotr Wendzierski </br>
**GitHub**: (https://github.com/piotrwendzierski)

---

> Follow best practices, format your code, use `.gitignore`, and commit often.
