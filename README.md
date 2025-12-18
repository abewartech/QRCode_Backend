<!-- GitAds-Verify: ZFJR6CYIVTVKVBV7X58CNE4V83MNMVSR -->

# QRCode Backend

[![Laravel](https://img.shields.io/badge/Laravel-8.x-ff2d20?logo=laravel&amp;logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-%5E7.3%20%7C%20%5E8.0-777bb4?logo=php&amp;logoColor=white)](https://www.php.net)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
![Build Status](https://img.shields.io/badge/build-passing-brightgreen.svg)

## Overview

QRCode Backend is a Laravel-based backend application for generating, managing, and tracking QR codes.  
It provides an admin interface (Backpack for Laravel) to configure QR code content, view scan history, export data, and integrate with external systems.  
The project is suitable as a starting point for QR-code-based campaigns, vouchers, access control, or attendance tracking.

## Features

- QR code generation using [endroid/qr-code](https://github.com/endroid/qr-code) and [simplesoftwareio/simple-qrcode](https://github.com/SimpleSoftwareIO/simple-qrcode).
- Authentication and authorization with [Laravel Sanctum](https://laravel.com/docs/sanctum) and Backpack Permission Manager.
- Admin panel for managing QR code records and related entities.
- QR scan history and analytics views.
- PDF export support via `barryvdh/laravel-dompdf`.
- REST-style APIs for integration with external frontends or mobile apps.
- Docker-based local development environment (via Laravel Sail / provided docker setup).

## Screenshots

| ![QR Code Preview](https://raw.githubusercontent.com/abewartech/QRCode_Backend/main/public/qr.png) | ![Dashboard Screenshot](https://raw.githubusercontent.com/abewartech/QRCode_Backend/main/public/Screenshot%202022-02-06%20110539.png) | ![Scan History Screenshot](https://raw.githubusercontent.com/abewartech/QRCode_Backend/main/public/screencapture-vale-bismut-id-scan-history-2022-02-06-11_27_47.png) |
|:---:|:---:|:---:|
| *QR Code Preview* | *Admin Dashboard* | *Scan History Page* |

## Installation

### Prerequisites

- PHP `^7.3` or `^8.0`
- Composer
- MySQL or compatible database
- Node.js and npm/yarn (for asset compilation)
- Optional: Docker + Docker Compose (for Laravel Sail)

### Steps

1. **Clone the repository**

   ```bash
   git clone https://github.com/abewartech/QRCode_Backend.git
   cd QRCode_Backend
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install frontend dependencies**

   ```bash
   npm install
   # or
   yarn install
   ```

4. **Copy environment file and configure**

   ```bash
   cp .env.example .env
   ```

   Then update `.env` with your database credentials and any other required configuration.

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Run migrations and seeders**

   ```bash
   php artisan migrate --seed
   ```

7. **Build frontend assets**

   ```bash
   npm run dev
   # or for production
   npm run prod
   ```

8. **Start the application**

   ```bash
   php artisan serve
   ```

   Or, using Sail (Docker):

   ```bash
   ./vendor/bin/sail up -d
   ```

   The application will typically be available at `http://localhost:8000` (or the port configured in your environment).

## Usage

### Generating QR Codes

QR code generation is typically handled through the admin panel or via dedicated routes/controllers.

Example: using the `simple-qrcode` package within a controller:

```php
use SimpleSoftwareIO\QrCode\Facades\QrCode;

public function generate()
{
    $svg = QrCode::size(300)->generate('https://example.com');
    return response($svg)->header('Content-Type', 'image/svg+xml');
}
```

### Accessing the Admin Panel

After installation and seeding:

1. Ensure you have an admin user created (for example via seeders or manual creation).
2. Log in via the configured admin route (commonly `/admin` if using Backpack defaults).
3. From the dashboard, you can:
   - Create and manage QR code entities.
   - View scan history and analytics.
   - Export reports (e.g., as PDF).

### API Usage

The application can expose QR-related endpoints for frontends/mobile apps.

Example request (assuming an API route like `/api/qrcodes/{id}`):

```bash
curl -H "Accept: application/json" \
     -H "Authorization: Bearer YOUR_API_TOKEN" \
     https://your-domain.test/api/qrcodes/1
```

Response structure will follow the JSON resource/transformer defined in the application.

## Project Structure

A brief overview of important files and directories:

- `app/` – Application core (models, controllers, services, etc.).
- `app/Http/Controllers/` – HTTP controllers, including QR code and admin-related endpoints.
- `config/` – Application configuration files.
- `database/migrations/` – Database schema definitions.
- `database/seeders/` – Database seeders for initial data (including admin user/roles, if provided).
- `public/` – Publicly accessible assets (including QR code images and screenshots).
- `resources/views/` – Blade templates for web views and admin pages.
- `routes/web.php` – Web routes.
- `routes/api.php` – API routes.
- `webpack.mix.js` – Asset compilation configuration.
- `docker/` – Docker-related configuration (if using the provided setup).

## Technologies

**Backend & Framework**

- ![PHP](https://img.shields.io/badge/PHP-7.3%2B-777bb4?logo=php&amp;logoColor=white)
- ![Laravel](https://img.shields.io/badge/Laravel-8.x-ff2d20?logo=laravel&amp;logoColor=white)
- [Backpack for Laravel](https://backpackforlaravel.com)
- [Laravel Sanctum](https://laravel.com/docs/sanctum)

**QR & Media**

- [endroid/qr-code](https://github.com/endroid/qr-code)
- [simplesoftwareio/simple-qrcode](https://github.com/SimpleSoftwareIO/simple-qrcode)
- [intervention/image](http://image.intervention.io/)

**Other**

- ![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?logo=mysql&amp;logoColor=white)
- ![Docker](https://img.shields.io/badge/Docker-Supported-2496ed?logo=docker&amp;logoColor=white)
- ![Node.js](https://img.shields.io/badge/Node.js-LTS-339933?logo=node.js&amp;logoColor=white)
- ![NPM](https://img.shields.io/badge/npm-Configured-cb3837?logo=npm&amp;logoColor=white)

## Contributing

Contributions are welcome. To contribute:

1. Fork the repository.
2. Create a new branch for your feature or fix:

   ```bash
   git checkout -b feature/your-feature-name
   ```

3. Make your changes and ensure tests pass:

   ```bash
   phpunit
   ```

4. Commit your changes with a descriptive message:

   ```bash
   git commit -m "feat: describe your change"
   ```

5. Push your branch:

   ```bash
   git push origin feature/your-feature-name
   ```

6. Open a Pull Request describing your changes and the motivation behind them.

Please follow existing code style conventions and add tests where appropriate.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). The license information can be found in the `LICENSE` file (or within `composer.json`).


