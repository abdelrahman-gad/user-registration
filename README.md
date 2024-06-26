#  Theqahalenjaz Assessment Task

This project is designed to dopa software comany

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP >= 8.2
- Composer
- MySQL

### Installing

Follow these steps to get the project running:

1. Clone the repository:

    ```bash
    git clone https://github.com/abdelrahman-gad/user-registration
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Create a copy of the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Update the `.env` file with your database credentials.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=root
DB_PASSWORD=
```


6. Update `.env` Variables

```
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

QUEUE_CONNECTION=database
```

7. Run database migrations:

    ```bash
    php artisan migrate
    ```

### Running Tests

To run tests

```bash
php artisan test 
```

### Seeding database

To run tests:

```bash
php artisan db:seed
```

### Default Credentials for user side

For testing purposes, the project provides the following default credentials:

- **Username:** `user@user.com`
- **Password:** `password`















