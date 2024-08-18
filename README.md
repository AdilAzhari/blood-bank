# Blood Bank Management System

## Overview

The Blood Bank Management System is a comprehensive application designed to manage blood donations and distributions. The system provides functionalities for managing donors, blood requests, and blood stock. It includes features such as user authentication, permission management, API integration, and notifications.

## Features

- **User Management**: Registration, login, and profile management.
- **Donor Management**: Add, update, and view donor information.
- **Blood Requests**: Create and manage blood requests.
- **Blood Stock Management**: Track and manage available blood units.
- **Notifications**: Send notifications via email and push notifications.
- **API Integration**: Expose and consume APIs for data exchange.
- **File Uploads**: Handle file uploads for documentation and records.
- **Permissions Management**: Manage user roles and permissions with Spatie's Laravel Permission package.
- **UI Components**: Utilize Laravel UI for authentication scaffolding and Bootstrap for front-end components.

## Technologies Used

- **Backend**: Laravel
- **Frontend**: AdminLTE (for the admin panel), Bootstrap
- **Database**: MySQL
- **Other**: Laravel Notification Channels, Laravel APIs, File Storage
- **Packages**:
  - `laravel/ui`: Provides authentication scaffolding for Laravel.
  - `spatie/laravel-permission`: Manages roles and permissions in the application.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL or other supported database systems

### Clone the Repository

```bash
git clone https://github.com/adelazhary/blood-bank.git
cd bloodbank-project
```

### Install Dependencies

```bash
composer install
```

### Install Additional Packages

Install Laravel UI and Spatie Laravel Permission:

```bash
composer require laravel/ui spatie/laravel-permission
```

### Set Up Environment

Copy the `.env.example` file to `.env` and configure your environment variables:

```bash
cp .env.example .env
```

Update `.env` with your database and other configuration details:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bloodbank
DB_USERNAME=root
DB_PASSWORD=
```

### Generate Application Key

```bash
php artisan key:generate
```

### Migrate the Database

Run the migrations to set up the database schema:

```bash
php artisan migrate
```

### Seed the Database

(Optional) Seed the database with initial data:

```bash
php artisan db:seed
```

### Serve the Application

```bash
php artisan serve
```

Visit `http://localhost:8000` in your web browser to access the application.

## Usage

- **Admin Panel**: Access the admin panel at `/admin`. Use the credentials provided in your `.env` file or seeded data.
- **Donor Registration**: Donors can register through the public registration form.
- **Blood Requests**: Request blood through the public interface and manage requests in the admin panel.

## API Documentation

The project includes API endpoints for interacting with the system programmatically. For detailed API documentation, refer to the `/docs` folder or the API documentation generator configured in the project.

## Contributing

We welcome contributions to the Blood Bank Management System. If you would like to contribute, please fork the repository and submit a pull request. Ensure that your code adheres to the existing coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any questions or support, please reach out to:

- **Email**: adilazhariosman@gmail.com
- **GitHub Issues**: [https://github.com/adelazhary/blood-bank/issues](https://github.com/adelazhary/blood-bank/issues)

Thank you for using the Blood Bank Management System!
```
