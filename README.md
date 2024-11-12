# Laravel Box Office Analysis Project

This project is designed to analyze box office trends across multiple theaters and movies. The application is built with Laravel, running inside a Docker environment using Nginx and PHP-FPM. This setup is ideal for development, and the structure can easily be extended for production.

## Table of Contents

- [Development Environment Setup](#development-environment-setup)
- [How to Test](#how-to-test)
- [Areas for Future Improvement](#areas-for-future-improvement)
- [Project Structure](#project-structure)

## Development Environment Setup

To get started with this project in a local environment, follow these steps.

### Prerequisites

Ensure you have the following installed on your machine:

- **Docker** (v20.10 or later)
- **Docker Compose** (v1.27 or later)

### Steps

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/blubird28/A2A.git
   cd A2A
   ```

2. **Configure Environment Variables**:

   Copy the `.env.example` file to create a `.env` file and configure it for database connections:

   ```bash
   cp .env.example .env
   ```

    Ensure the `.env` file includes these database settings:

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=athelete_db
    DB_USERNAME=athelete
    DB_PASSWORD=athelete
    ```

3.  **Build and Start Docker Containers**:

    Use Docker Compose to build and start the containers:

    ```bash
    docker-compose up --build -d
    ```

4.  **Install PHP Dependencies**:

    Run the following command to install Laravel dependencies within the Docker container:

    ```bash
    docker-compose run --rm composer install
    ```
    
5.  **Run Migrations and Seed Database**:

    Initialize the database by running migrations and seeders:

    ```bash
    docker-compose exec php php artisan migrate --seed
    ```

6.  **Access the Application**:

    The application should now be accessible at http://localhost:8000.

    Visit http://localhost:8000/api/top-theater?date=2024-05-09 to get the top theater for that date.

## Areas for Future Improvement

This project can be further improved in various ways:

1. **Scalable Architecture**:
   - As the project grows, consider adopting a **Repository-Service-Controller** architecture to improve separation of concerns and scalability.
   - **Repository Layer**: Responsible for interacting with the database, encapsulating data access logic, and allowing for easier testing and swapping of data sources.
   - **Service Layer**: Encapsulates business logic, making controllers more streamlined and focusing only on handling requests and responses.
   - **Controller Layer**: Manages HTTP requests, delegating business logic to services and data access to repositories, ensuring modularity and maintainability.
   - This architecture can simplify testing, allow for reusability of business logic, and make the project more adaptable to future requirements.

2. **Request Validation**:
   - Implement centralized request validation using Laravel's form request classes to ensure data consistency and protect against invalid input.
   - Validation rules for routes such as `/top-theater` (e.g., date format checks) can be encapsulated in a custom request class.
   - This approach will help controllers remain clean and focused, as well as enhance security by preventing potentially harmful input from reaching the application logic.

3. **Caching**:
   - Implement query caching to store and quickly retrieve frequent queries, such as the top-grossing theater.
   - Cache layers like Redis or Memcached can be configured to enhance performance.

4. **API Rate Limiting**:
   - To prevent abuse, consider adding rate limiting to critical API routes, especially `/top-theater`.
   - Laravel's built-in rate limiting middleware can be configured to manage traffic.

5. **Automated Testing**:
   - Expand test coverage, especially for edge cases and performance testing.
   - Consider using CI/CD tools like GitHub Actions to run tests automatically on every commit.

6. **Analytics Dashboard**:
   - Create a frontend dashboard to visualize trends, like top theaters or high-grossing movies over time.
   - Use charting libraries such as Chart.js or D3.js.

7. **Authentication**:
   - Implement authentication (e.g., using Laravel Sanctum or Passport) to secure API endpoints, allowing access to only authorized users.

8. **Error Handling and Logging**:
   - Enhance error handling to log issues and provide clear user feedback.
   - Use monitoring tools (e.g., Sentry, Loggly) for error tracking in production.

9. **Docker Improvements**:
   - Separate development and production configurations to optimize for each environment.
   - Use multi-stage Docker builds to minimize image size for production deployments.