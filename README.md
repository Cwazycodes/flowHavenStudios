# PHP Boilerplate Handbook

Welcome to the PHP Boilerplate! This guide is designed for complete beginners. It will explain **every file, function, and class**, and show you how to create routes, controllers, and views so you can build your own PHP web application.

---

## 🔧 Boilerplate Structure Overview

```
PHPBoilerplate/
├── Core/                    # Core application logic (like a mini-framework)
├── Http/
│   ├── Forms/               # Form validators
│   └── controllers/         # Application logic (controllers)
├── public/
│   └── index.php            # Main entry point (front controller)
├── bootstrap.php            # Bootstraps the app
├── config.php               # App config (e.g. DB, base path)
├── routes.php               # URL routing definitions
```

---

## 🧠 Core Classes Explained (in `/Core`)

### `App.php`

**Purpose:** The main app runner. It loads routes, handles the request, and sends the response.

```php
App::loadRoutes();
App::run();
```

### `Router.php`

**Purpose:** Maps URLs to controller files.

* `get($uri, $controller)` – Handles GET requests.
* `post($uri, $controller)` – Handles POST requests.
* `route()` – Resolves the current request and runs the matching controller.

### `Response.php`

**Purpose:** Sends HTTP responses.

* `Response::redirect('/path')` – Redirect to another URL.

### `Session.php`

**Purpose:** Manages sessions and flash messages.

* `Session::set()` – Store session data.
* `Session::get()` – Retrieve session data.
* `Session::flash()` – Store one-time message (like success alerts).

### `Database.php`

**Purpose:** Provides a PDO-based DB connection.

* `Database::query($sql)` – Run raw SQL.
* `Database::prepare($sql)` – Prepare a SQL statement for safer queries.

### `Validator.php`

**Purpose:** Basic validation logic.

* `Validator::string()` – Validate string length.
* `Validator::email()` – Validate email format.

### `Authenticator.php`

**Purpose:** Handles user login/auth status.

* `Authenticator::attempt($email, $password)` – Try to log in.
* `Authenticator::logout()` – Log out the current user.

### `Container.php`

**Purpose:** Simple dependency injection (optional, for advanced usage).

### `Middleware/`

**Purpose:** Code that runs before/after requests (e.g. auth checks).

* `Authenticated.php` – Blocks guests.
* `Guest.php` – Blocks logged-in users.
* `Middleware.php` – Base class.

### `functions.php`

**Purpose:** Helper functions (like `dd()` to dump and die, or `base_path()`).

---

## ⚙️ `bootstrap.php`

Loads the app configuration and starts the session.

```php
require 'config.php';
session_start();
```

---

## 🗂️ `config.php`

Set your DB credentials, base path, etc.

```php
return [
  'db' => [
    'host' => 'localhost',
    'database' => 'myapp',
    'user' => 'root',
    'password' => ''
  ]
];
```

---

## 🛣️ `routes.php`

Define all your app routes here:

```php
$router->get('/', 'controllers/home.php');
$router->post('/contact', 'controllers/contact.php');
```

---

## 🚪 `public/index.php`

This is the entry file. It bootstraps the app and calls the router:

```php
require '../bootstrap.php';
require '../routes.php';
App::run();
```

---

## 🧪 How to Add a New Page (Route, View, Controller)

Let’s say you want to add a **"Contact Us"** page.

### 1. Create a Route (in `routes.php`)

```php
$router->get('/contact', 'controllers/contact.php');
```

### 2. Create a Controller File

In `Http/controllers/contact.php`:

```php
view("contact.view.php", [
  'title' => 'Contact Us'
]);
```

### 3. Create a View File

In `views/contact.view.php`:

```html
<?php require('partials/header.php'); ?>
<h1><?= $title ?></h1>
<form method="POST" action="/contact">
  <input type="text" name="name" placeholder="Your Name">
  <textarea name="message"></textarea>
  <button type="submit">Send</button>
</form>
<?php require('partials/footer.php'); ?>
```

### 4. (Optional) Add a POST Route

In `routes.php`:

```php
$router->post('/contact', 'controllers/contact-submit.php');
```

And create `Http/controllers/contact-submit.php` to handle the form.

---

## 📬 Flash Messages (e.g. success after form)

In `contact-submit.php`:

```php
Session::flash('success', 'Message sent!');
Response::redirect('/contact');
```

In `contact.view.php`:

```php
<?php if ($message = Session::get('success')): ?>
  <div class="alert"> <?= $message ?> </div>
<?php endif; ?>
```

---

## 🔐 Expanded Example: Login and Registration

### ✅ Step 1: Add Routes

In `routes.php`:

```php
$router->get('/login', 'controllers/auth/login.php');
$router->post('/login', 'controllers/auth/login-submit.php');
$router->post('/logout', 'controllers/auth/logout.php');
```

### 🧠 Step 2: Create Login Controller (GET)

`Http/controllers/auth/login.php`

```php
view('auth/login.view.php', [ 'title' => 'Login' ]);
```

### 💬 Step 3: Create Login View

`views/auth/login.view.php`

```php
<form method="POST" action="/login">
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Login</button>
</form>
```

### 🔐 Step 4: Handle Login Submission

`Http/controllers/auth/login-submit.php`

```php
use Core\Authenticator;

if ((new Authenticator)->attempt($_POST['email'], $_POST['password'])) {
    Response::redirect('/dashboard');
} else {
    Session::flash('error', 'Invalid login.');
    Response::redirect('/login');
}
```

### 🚪 Step 5: Logout

`Http/controllers/auth/logout.php`

```php
use Core\Authenticator;

(new Authenticator)->logout();
Response::redirect('/');
```

---

## ✅ Next Steps

* Add your own routes and views
* Connect to a database
* Create login and registration using the `Authenticator`
* Use middleware to restrict access to pages

---

## 🧼 Tips

* Keep reusable logic in `Core/`
* Use `Forms/` for form validation
* Organize views inside `views/` folder

---

## 📚 Glossary

* **Route**: A URL path handled by a controller.
* **Controller**: PHP file that handles request logic.
* **View**: HTML template shown to the user.
* **Middleware**: Code that runs before a route (like auth checks).
* **Session**: Stores user data across requests.

---

## 🚀 How to Start a PHP Server

To run your PHP app locally without Apache or Nginx, use PHP’s built-in development server.

### ✅ Steps:

1. Open your terminal and navigate to the root of your project:

   ```bash
   cd PHPBoilerplate/
   ```

2. Start the server with the `public/` folder as the document root:

   ```bash
   php -S localhost:8000 -t public
   ```

3. Open your browser and go to:

   ```
   http://localhost:8000
   ```

You should now see your PHP application running!

> 💡 This command tells PHP to serve files from the `public/` directory, which is your front controller and where `index.php` lives.

---

That’s it! You now have a lightweight but powerful foundation to build PHP apps quickly. 🚀


