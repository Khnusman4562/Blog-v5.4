# Blog Project

This is a simple blog project developed using PHP Laravel 5.6 and Vue.js. It allows users to perform CRUD (Create, Read, Update, Delete) operations on blog posts.

## Features

- Create, Read, Update, and Delete blog posts
- Responsive user interface with Vue.js
- Backend powered by Laravel 5.6
- RESTful API for seamless communication between the frontend and backend

## Requirements

- Laravel 5.6
- Composer
- Node.js and npm
- Vue.js

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Khanusman4562/blog-v5.6.git
    ```

2. Install backend dependencies:

    ```bash
    cd blogs-client
    composer install
    ```

3. Install frontend dependencies:

    ```bash
    cd blogs-api
    npm install
    ```

4. Update the `.env` file with your database credentials and other necessary settings.

5. Migrate the database:

    ```bash
    php artisan migrate
    ```

6. Start blogs-client server:

    ```bash
    npm run serve
    ```

7. Start the blogs-api server:

    ```bash
    php artisan serve
    ```

    Your application will be available at http://localhost:8000.

