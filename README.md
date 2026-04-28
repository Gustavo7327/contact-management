# Contact CRUD Application

This is a Laravel-based web application that provides a simple CRUD (Create, Read, Update, Delete) interface for managing contacts. Users can add, view, edit, and delete contact information including name, email, and contact details.

## Features

- **Create Contacts**: Add new contacts with name, email, and contact information.
- **Read Contacts**: View a list of all contacts or individual contact details.
- **Update Contacts**: Edit existing contact information.
- **Delete Contacts**: Soft delete contacts (they can be restored if needed).

The application uses Laravel's Eloquent ORM for database interactions and includes form validation for data integrity.

## Authentication

- The contact list can be viewed by anyone without authentication.
- Creating, editing, and deleting contacts requires user authentication.
- A default admin user is created via database seeding:
  - Email: admin@admin.com
  - Password: 123456
- Use the login form at `/login` to authenticate.

## Unique Key Constraints

The Contact model utilizes soft deletes, allowing deleted records to be restored. To handle unique constraints properly with soft deletes, composite unique keys are used:

- A unique constraint on `email` and `deleted_at`: This ensures that active contacts (where `deleted_at` is NULL) have unique emails, but allows the same email to be reused if the previous contact was soft deleted.
- A unique constraint on `contact` and `deleted_at`: Similarly, this ensures unique contact numbers for active records, permitting reuse after soft deletion.

This approach prevents conflicts when restoring deleted contacts or creating new ones with previously used emails/contacts.

## Installation and Setup

Follow these steps to set up and run the project locally:

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and npm
- A database (e.g., MySQL, PostgreSQL, SQLite)

### Steps

1. **Clone the repository** (if not already done):
   ```
   git clone <repository-url>
   cd <project-directory>
   ```

2. **Install PHP dependencies**:
   ```
   composer install
   ```

3. **Install Node.js dependencies**:
   ```
   npm install
   ```

4. **Environment Configuration**:
   - Copy the example environment file:
     ```
     cp .env.example .env
     ```
   - Generate an application key:
     ```
     php artisan key:generate
     ```
   - Configure your database settings in the `.env` file (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5. **Run Database Migrations**:
   ```
   php artisan migrate
   ```

6. **Seed the Database** (optional):
   ```
   php artisan db:seed
   ```
   This will create a default admin user (email: admin@admin.com, password: 123456) and populate the database with sample contacts.

7. **Build Assets**:
   - For development:
     ```
     npm run dev
     ```
   - For production:
     ```
     npm run build
     ```

8. **Start the Development Server**:
   ```
   php artisan serve
   ```

   The application will be available at `http://localhost:8000`.

## Testing

Run the test suite with:
```
php artisan test
```

The application includes tests for form validation when adding or editing contacts, ensuring data integrity and proper error handling.

**PHP and Laravel Project**