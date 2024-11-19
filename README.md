

## Building API's  Project

This repository contains the implementation of a Laravel-based application designed for managing a company's projects and employees. The project demonstrates core Laravel skills, including MVC architecture, database management, Eloquent ORM, API development, validation, error handling, authentication, and debugging.

## Features
1. Models and Migrations
Project Model:
Fields: id, name, description, status, start_date, end_date, created_at, updated_at.
Relationships: A Project has many Employees (One-to-Many).
Employee Model:
Fields: id, project_id, name, email, position, created_at, updated_at.
Relationships: An Employee belongs to a Project.
2. API Endpoints
CRUD Operations
Projects:
Create, Read, Update, Delete (Soft delete included).
Employees:
Create, Read, Update, Delete (Employees linked to Projects).
Special Endpoints
Restore soft-deleted employees.
3. Validation and Error Handling
Projects:
Name is required and must be unique.
Employees:
Email is required, valid, and unique.
Error responses for validation failures ensure clear feedback.
4. Soft Deletes
Implemented for both Projects and Employees.
Restore endpoint provided for soft-deleted employees.
5. Reporting and Dashboard
Project Dashboard:
Summary of all projects, including:
Total number of projects.
Total employees.
Projects grouped by status.
Detailed list of projects with their respective employees.
Search and Filter:
Search projects by name or status.
Pagination implemented for employee lists.
6. Debugging and Optimization
Error Handling:
Resolved potential N+1 query issues.
Used try-catch blocks for robust error handling.
Performance Optimization:
Caching implemented for frequently accessed data using Laravel's caching mechanism.
