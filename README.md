# Laravel 8 REST API

This is a simple Laravel 8 REST API backed by a database. It includes endpoints to manage users and orders. Users can be created, and orders can be created for each user. The API also provides endpoints to get user details, update user information, and retrieve all orders for a user with the total order value.

## Requirements

- Laravel 8
- PHP 7.4 or later
- Composer
- MySQL or any other supported database

## Installation

1. Clone the repository or download the source code.

2. Navigate to the project directory:

   ```bash
   cd laravel-rest-api

3. Install the dependencies using Composer:

    ```bash
    composer install
3. Create a copy of the .env.example file and rename it to .env:
    ```bash
        cp .env.example .env

3. Generate a new application key:
    ```bash
       php artisan key:generate
     
3. Update the .env file with your database configuration details:
    ```bash
       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=your_database_name
       DB_USERNAME=your_username
       DB_PASSWORD=your_password
     
3. Run the database migrations to create the required tables:
    ```bash
       php artisan migrate
     
3. Navigate to the project directory:
    ```bash
       php artisan key:generate
     

## USAGE
3. Navigate to the project directory:
    ```bash
      php artisan serve

## API Endpoints
###Create User
- URL: POST /api/users
- Request Body: JSON
    ```bash
    {
      "name": "John Doe"
    }

  
- Response Body: JSON
    ```bash
    {
      "id": 1,
      "name": "John Doe"
    }

###Create Order
- URL: POST /api/orders

- Request Body: JSON

    ```bash
    {
      "user_id": 1,
      "date": "2023-05-26",
      "total_value": 100.00
    }
- Response Body: JSON

    ```bash
    {
      "id": 1,
      "user_id": 1,
      "date": "2023-05-26",
      "total_value": 100.00
    }
### Get User by ID
- URL: GET /api/users/{id}

- Response Body: JSON

    ```bash
    {
      "id": 1,
      "name": "John Doe"
    }
### Update User's Name
- URL: PUT /api/users/{id}

- Request Body: JSON

    ```bash
    {
      "name": "Updated Name"
    }
    
- Response Body: JSON

    ```bash
    {
      "id": 1,
      "name": "Updated Name"
    }
  
### Get User's Orders and Total Value
- URL: GET /api/users/{id}/orders

- Response Body: JSON

    ```bash
    {
      "orders": [
        {
          "id": 1,
          "user_id": 1,
          "date": "2023-05-26",
          "total_value": 100.00
        },
        {
          "id": 2,
          "user_id": 1,
          "date": "2023-05-27",
          "total_value": 200.00
        }
      ],
      "total_value": 300.00
    }

###Running Tests
To run the unit tests, use the following command:

    ```bash
    php artisan test
    
The tests will be executed, and the results will be displayed in the console.

### Conclusion
Congratulations! You have successfully set up and executed the Laravel 8 REST API. You can now use the provided endpoints to create users, create orders, get user details, update user information, and retrieve user orders with the total order value. Feel free to customize and extend the API based on your requirements.

If you have any questions or encounter any issues, please don't hesitate to reach out.

Happy coding!
