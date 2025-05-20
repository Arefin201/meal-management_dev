# Meal Account Management

A Laravel 11 application to manage daily meal accounts, costs, member balances, and roles & permissions. Built with Laravel Breeze for authentication, Spatie's Laravel-Permission for role management, and MySQL as the database.

## Features

* User Authentication (Laravel Breeze)
* Role & Permission Management (Spatie Laravel-Permission v6)
* Daily Meal Tracking
* Market Cost Recording
* Cooking Payment Management
* Monthly Summary Reports
* Multi-lingual (Localization)

## Tech Stack

* **Framework**: Laravel 11
* **Starter Kit**: Laravel Breeze
* **Roles & Permissions**: [Spatie Laravel-Permission v6](https://spatie.be/docs/laravel-permission/v6/)
* **Database**: MySQL
* **Front-end**: Blade + Tailwind CSS

## Prerequisites

* PHP >= 8.1
* Composer
* Git
* MySQL
* Node.js & npm

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/yourusername/meal-account-management.git
   cd meal-account-management
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**

   ```bash
   npm install
   npm run dev
   ```

4. **Environment Setup**

   * Copy `.env.example` to `.env`
   * Generate application key

     ```bash
     php artisan key:generate
     ```
   * Configure database settings in `.env`:

     ```dotenv
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Run Migrations & Seeders**

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Link Storage (if used)**

   ```bash
   php artisan storage:link
   ```

## Roles & Permissions

This application uses Spatie's Laravel-Permission package. To learn more about managing roles and permissions, see the official docs:

> [https://spatie.be/docs/laravel-permission/v6/](https://spatie.be/docs/laravel-permission/v6/)

You can create roles and assign permissions via tinker or seeders:

```bash
php artisan tinker
>>> use Spatie\Permission\Models\Role;
>>> use Spatie\Permission\Models\Permission;
>>> Role::create(['name' => 'admin']);
>>> Permission::create(['name' => 'manage meals']);
>>> $role = Role::findByName('admin');
>>> $role->givePermissionTo('manage meals');
```

## Localization (Locale)

To switch the application locale (e.g., `en`, `bn`):

1. Add translations to the `resources/lang/{locale}` folder.
2. Update `config/app.php`:

   ```php
   'locale' => 'bn', // or 'en'
   ```
3. (Optional) Publish language files:

   ```bash
   php artisan vendor:publish --tag=laravel-lang
   ```

## Running the App Locally

Start the development server:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

## Docker (Optional)

*To be added later.*

## Contributing

1. Fork this repository
2. Create your feature branch (`git checkout -b feature/YourFeature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/YourFeature`)
5. Open a Pull Request

## License

This project is open-sourced under the MIT license.

---

*Happy coding!*
### Dashboard
- **Daily Meal Tracking**: Monitor daily meal participation.
- **Market Expenses**: Track grocery costs with date, description, and member associations.
- **Members Management**: View member contributions and balances.
- **Cooking Payments**: Record payments for cooking duties.
- **Monthly Summary**: Financial overview with totals and trends.
- **Role-Based Access Control**: Manage permissions using Spatie's Laravel-Permission.

### User Roles & Permissions
- Predefined roles: `Admin`, `Member`, `Accountant`.
- Granular permissions (e.g., `manage-expenses`, `view-reports`).
- Role assignment via UI.

### Market Expenses Module
- Add/Edit/Delete expenses with descriptions and amounts.
- Filter expenses by date range and member.
- Currency formatting (¥, $).

### Member Profiles
- Track individual balances.
- Activate/deactivate accounts.
- View transaction history.

## Technologies Used
- **Backend**: Laravel 9/10
- **Frontend**: Laravel Breeze (Blade), Tailwind CSS
- **Database**: MySQL
- **Packages**:
  - `spatie/laravel-permission` for RBAC
  - `laravel-currency` (example package for currency handling)

## Installation

1. **Clone Repository**
   ```bash
   git clone https://github.com/yourusername/meal-management.git
   cd meal-management
Install Dependencies

bash
composer install
npm install && npm run build
Configure Environment

bash
cp .env.example .env
# Update DB credentials in .env
Database Setup

bash
php artisan migrate --seed
Generate Key

bash
php artisan key:generate
Run Server

bash
php artisan serve
Role Configuration (Using Spatie)
Create Roles

php
// In seeder or tinker
Role::create(['name' => 'Admin']);
Role::create(['name' => 'Accountant']);
Assign Permissions

php
$adminRole = Role::findByName('Admin');
$adminRole->givePermissionTo(['manage-users', 'edit-expenses']);
Assign Roles via UI

Navigate to Role & Permission dashboard section.

Database Structure
Key tables:

users: Member profiles

expenses: Market purchases

roles: User roles

permissions: System capabilities

role_has_permissions: Permission assignments

Usage
Access http://localhost:8000

Login with:

Admin: admin@example.com / password

Navigate dashboard sections using sidebar.
