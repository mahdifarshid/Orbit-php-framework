# OrbitPHPFramework

OrbitPHPFramework is a lightweight and flexible PHP framework designed for building modern web applications with ease. Its intuitive routing, middleware support, and modular design make it an ideal choice for developers seeking simplicity without compromising on power.

---

## Features

- **Simple Routing:** Define routes effortlessly with support for HTTP methods and route parameters.
- **Modular Design:** Easily extend functionality with your own components.
- **Lightweight:** Focused on minimalism for fast and efficient web applications.
- **Controller Support:** Organize your logic using a controller-based structure.
- **Custom CLI Commands:** Create controllers and manage your project directly from the terminal.
- **Composer-Friendly:** Fully compatible with Composer for dependency management.

---

## Installation

You can install OrbitPHPFramework via Composer:

```bash
composer create-project orbitphpframework/orbit
```

## Getting Started

Setting Up Your Project
Clone the repository or use the create-project command above.
Install dependencies:

```bash
composer install
```
## Start the development server:

```bash
php -S localhost:8000 -t src/public
```

Creating a Controller
Use the built-in CLI tool to generate a controller:

```bash
php bin/Orbit make:controller HomeController
```

This will create a HomeController in the src/Controllers directory.

## Defining Routes
Add your application routes in src/Router/web.php:

```bash
<?php

use Orbit\Orbit\Router;

$router = new Router();

$router->get('/', function () {
    echo "Welcome to OrbitPHPFramework!";
});

$router->get('/home', 'HomeController@index');

return $router;
```

# Directory Structure
```bash
src/Controllers: Contains your application's controllers.
src/Router: Define routes for your application.
src/public: The public-facing directory of your application.
bin: Contains the Orbit CLI tool for project management.
```

License
OrbitPHPFramework is open-source software licensed under the MIT License.

Contributing
We welcome contributions to enhance OrbitPHPFramework. Feel free to submit issues, feature requests, or pull requests to the repository.

Author
Farshid Mahdi
Email: farshidf276@gmail.com
Stay Updated
Follow the repository for updates, new features, and announcements!