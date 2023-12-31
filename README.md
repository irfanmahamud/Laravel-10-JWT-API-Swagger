# Laravel Article API

This is a Laravel-based RESTful API project that provides endpoints to manage articles. The API allows you to create, retrieve, update, and delete articles, as well as retrieve a list of articles. It's designed with authentication using JWT tokens, ensuring secure access to the endpoints.

## Features

- **User Authentication**: Secure user authentication using JWT tokens.
- **Article Management**: Create, read, update, and delete articles.
- **Swagger Documentation**: Integrated Swagger for easy API documentation.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.4
- Composer
- Laravel CLI
- MySQL or your preferred database system

## Installation

1. Clone the repository to your local machine:

   ```bash
   git clone https://github.com/yourusername/laravel-article-api.git
   ```

2. Navigate to the project directory:

   ```bash
   cd laravel-article-api
   ```

3. Install the project dependencies using Composer:

   ```bash
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`:

   ```bash
   cp .env.example .env
   ```

5. Generate an application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database settings in the `.env` file:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Generate the JWT secret key:

   ```bash
   php artisan jwt:secret
   ```

## Usage

1. Start the development server:

   ```bash
   php artisan serve
   ```

2. Access the API documentation in your browser:

   ```
   http://localhost:8000/api/documentation
   ```

3. Register a user and obtain an authentication token.

4. Use the obtained token to access the API endpoints listed in the documentation.

## Testing

To run the PHPUnit tests, use the following command:

```bash
php artisan test
```

## Contributing

Contributions are welcome! Please open an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
