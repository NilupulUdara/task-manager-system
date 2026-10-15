Task Manager System

A simple task management web application built with Laravel 12, PHP, MySQL, and Blade templates.
The application allows users to manage tasks, update their statuses, search by title, filter by status, 
and navigate through paginated task lists.

1. Technologies Used

Backend: PHP 8.2+, Laravel 12<br>
Frontend: HTML, CSS, Laravel Blade<br>
Database: MySQL<br>
ORM: Laravel Eloquent ORM<br>
evelopment tools: Visual Studio Code, MYSQL Workbench<br>

2. Features

Create new tasks.
View task details and the task list.
Edit existing tasks.
Delete tasks with confirmation.
Update task statuses.
Search tasks by title.
Filter tasks by status.
Paginate task lists.
Validate user input.
Display success messages after successful operations.

3. Prerequisites

Ensure the following software is installed:
PHP 8.2 or a compatible version supported by the project.
Composer.
MySQL Server.
MySQL Workbench.
Node.js and npm.
Git.

4. Installation and Setup

Step 1: Clone the repository 
git clone https://github.com/NilupulUdara/task-manager-system.git

cd task-manager-system

Step 2: Install PHP dependencies
composer install

Step 3: Create the database

Open MySQL Workbench.
Connect to your local MySQL Server.

Create a database by executing the following SQL statement:
CREATE DATABASE task_manager_system;

Step 4: Configure the database connection in the Laravel .env file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager_system
DB_USERNAME=root
DB_PASSWORD=your_mysql_password

Replace root and your_mysql_password with the credentials for your MySQL Server.

Step 5: Run database migrations
php artisan migrate

Step 6: Start the application
php artisan serve

Step 7: Open the following URL in your browser:

http://127.0.0.1:8000

The application should now be ready to use.


Implementation Decisions

Laravel MVC architecture
The application follows Laravel's Model-View-Controller (MVC) architecture to separate database operations,
application logic, and the user interface.

Model: The Task model represents task records in the database.
View: Blade templates display task lists, forms, details, and validation messages.
Controller: TaskController handles CRUD operations, search, filtering, and pagination.

Eloquent ORM

Laravel Eloquent ORM is used for database operations. It provides a convenient way to retrieve, create, update, 
and delete task records without writing raw SQL queries for routine operations.

Form validation

A dedicated TaskRequest class handles request validation. This helps keep validation rules separate from the controller
logic and prevents invalid data from being stored.

Search and filtering

The task list supports searching by title and filtering by status. 
Eloquent query conditions are applied only when the corresponding filters are provided.

Pagination

The task list uses Laravel's pagination functionality to display a limited number of tasks per page. 
Query strings are preserved when navigating between pages so that active search and status filters remain applied.


Assumptions

Authentication and user accounts are not required.
All users share the same task list and can manage the available tasks.
Each task has a title, an optional description, a status, an optional due date, updated date and creation date.
Task statuses are restricted to the values defined by the application's validation rules.

The application runs locally using MySQL and Laravel's development server.

Database credentials and other environment-specific settings are configured through .env.

Challenges Encountered

Search, filtering, and pagination
Search and status filters need to work together, including when navigating between pages.
Laravel's query builder and withQueryString() help maintain the selected filters during pagination.
