# Property Management System
A web-based property management system built using Laravel, Blade templates, HTML, CSS, and JavaScript (for M-Pesa integration). This project provides a solution for property managers to efficiently manage tenants, handle rental payments, and address tenant issues through a secure, user-friendly platform.  For an in-depth look at the system (on my medium) kindly <a href="https://medium.com/@mark.onyango_95482/a-property-management-system-in-laravel-a4479110b961"> CLICK HERE.</a>

## Table of Contents
- [Features](#features)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Database Design](#database-design)
- [Code Structure](#code-structure)
- [Future Improvements](#future-improvements)
- [Challenges and Learnings](#challenges-and-learnings)
- [Testing and Debugging](#testing-and-debugging)
- [Live Demo](#live-demo)

## Features
- User Registration and Role-Based Access: 
  - Admin and Tenant roles.
  - Admins approve new tenant registrations and manage user access.
- CRUD Operations:
  - Complete Create, Read, Update, and Delete functionalities for properties, tenants, and issues.
- M-Pesa Payment Integration:
  - Tenants can pay rent directly from the system through M-Pesa, with real-time transaction processing.
- Issue Reporting:
  - Tenants can report maintenance or other issues, and admins can track and resolve them.
- Report Generation:
  - Admins can view reports on payments, issues, and tenant activity.

## System Requirements
- Server: Apache or Nginx
- Backend: PHP (Laravel framework)
- Frontend: HTML, CSS, Blade templates, and JavaScript (for M-Pesa)
- Database: MySQL

## Installation
To set up the Property Management System locally:
1. Clone the Repository
   ```bash
   git clone https://github.com/Mark-crypto/property_management_system.git
   ```
2. Install Dependencies
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Environment Setup 
   Copy `.env.example` to `.env` and configure your database and M-Pesa API credentials.
4. Database Migration 
   Run migrations to set up the database structure:
   ```bash
   php artisan migrate
   ```
5. Start the Server  
   ```bash
   php artisan serve
   ```

## Database Design
The database uses MySQL and includes tables for managing users, properties, payments, issues, and reports. Key tables include:
- `users`: Stores user details and roles (Admin or Tenant).
- `properties`: Contains property records.
- `payments`: Tracks rent payments through M-Pesa.
- `issues`: Logs maintenance or other issues reported by tenants.
- `reports`: Summarizes system activities for admins.

## Code Structure
The project follows the Model-View-Controller (MVC) architecture:
- Models: Define database structure and relationships.
- Views: Rendered using Blade templates, providing a dynamic and responsive front end.
- Controllers: Handle user interactions, managing requests and responses.

## Future Improvements
- Tenant Payment Summaries: A feature to allow tenants to view a summary of their payment history.
- Automated Email Reminders: Remind tenants of upcoming due dates for rent.
- Advanced Reports: Generate more detailed reports for rental and maintenance activities.
- Two-Factor Authentication: Increase security for login access.

## Challenges and Learnings
- Limited Development Time: Project required a quick turnaround, so core features were prioritized.
- Learning Curve: This was a new project using Laravel, PHP, and Blade templating, with a significant learning curve in these technologies.


## Testing and Debugging
- Unit Testing: Basic tests for CRUD operations, authentication, and M-Pesa integration.
- Live Testing: Access the live system for testing at [https://one.abongo.co.ke/login](https://one.abongo.co.ke/login) with the following credentials:
  - Email: `test@test.com`
  - Password: `12345678`

## Live Demo
Visit the live demo [here](https://one.abongo.co.ke/login) to explore the features and functionalities.
For more details or to contribute to the project, please feel free to reach out. Contributions and suggestions are welcome!
GitHub Repository: [https://github.com/Mark-crypto/property_management_system](https://github.com/Mark-crypto/property_management_system)
```
