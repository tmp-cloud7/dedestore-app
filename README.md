🛍️ dedestore-app E-Commerce Backend — Laravel CRUD API (Bootcamp Project)

A backend API for an E-Commerce Web Application, built using Laravel during Bootcamp to practice modern backend development concepts — including RESTful API design, database relationships, and CRUD operations.

This project manages products, vendors, and user authentication, providing a secure and scalable API for a frontend store or admin dashboard.

🧠 Overview

This backend forms the core logic of a full e-commerce platform — handling product management, user accounts, and pricing data.
It demonstrates how Laravel’s Eloquent ORM simplifies database operations and how to design clean APIs for frontend integration (such as React or Vue apps).

The goal of the Bootcamp project was to understand how to structure a backend system that connects smoothly with a frontend interface, using industry best practices for maintainability, scalability, and security.

⚙️ Core Features
🧾 Product Management

Add, view, update, and delete products (CRUD operations).

Manage product details like name, description, price, quantity, and category.

Support for product image uploads via API.

🧑‍💼 Vendor Association

Each product can be linked to a specific vendor (vendor_id field).

Vendors can manage their own product listings.

💰 Pricing System

Handles initial and selling prices separately.

Provides flexibility for discounts and markup tracking.

🗂️ Category-Based Organization

Products can be grouped and filtered by category for better management.

🔐 Authentication & Security (Optional Extension)

Supports Laravel’s built-in authentication scaffolding for user/vendor login.

Token-based authentication can be added using Laravel Sanctum for frontend communication.

🧩 Tech Stack

Layer	Technology,
Framework	Laravel 11,
Language	PHP,
Database	MySQL,
ORM	Eloquent ORM,
Web Server	Artisan / Apache / Nginx,
Package Manager	Composer,
Environment Management	.env,
Optional Frontend Integration	React,


📦 Model Structure

app/Models/Product.php

class Product extends Model

{
    use HasFactory;

    protected $fillable = [
        'product_name', 
        'product_desc', 
        'initial_price', 
        'selling_price', 
        'quantity', 
        'category',
        'product_image',
        'vendor_id',
    ];
}


This model defines the structure for the products table and the fields that can be mass-assigned through the API or dashboard forms.

📁 Project Structure
dedestore/

│

├── app/

│   ├── Http/

│   │   ├── Controllers/     # Contains API and logic controllers

│   ├── Models/              # Product and User models

│

├── bootstrap/               # Framework bootstrap files

├── config/                  # Laravel configuration files

├── database/                # Migrations and seeders

├── public/                  # Public assets and entry point

├── resources/               # Views, if needed

├── routes/

│   ├── api.php              # API routes (CRUD endpoints)

│   ├── web.php              # Optional web routes

│

├── storage/                 # Logs and file uploads

├── tests/                   # Test scripts

│

├── .env.example             # Example environment variables

├── composer.json            # PHP dependencies

├── artisan                  # Artisan CLI tool

├── README.md

🚀 Getting Started
🧰 Requirements

PHP 8.2+

Composer

MySQL

Laravel CLI

Optional: XAMPP / Valet / Docker

⚙️ Setup Steps

Clone the Repository

git clone https://github.com/tmp-cloud7/dedestore-app.git

cd dedestore-app


Install Dependencies

composer install


Create Environment File

cp .env.example .env


Generate Application Key

php artisan key:generate


Set Up Database

Create a new MySQL database.

Update .env with your credentials:

DB_DATABASE=ecommerce_db

DB_USERNAME=root

DB_PASSWORD=


Run Migrations

php artisan migrate


Serve the Application

php artisan serve


Visit the API at:
👉 http://localhost:8000/api/products

🧠 Bootcamp Learning Outcomes

During this Bootcamp project, you learned:

Setting up and structuring a Laravel project from scratch.

Creating and managing database migrations.

Defining Eloquent models and relationships.

Building RESTful APIs for frontend consumption.

Handling validation and image uploads.

Managing environment variables and configuration securely.

🧩 Example API Endpoints
Method	Endpoint	Description

GET	/api/products	Fetch all products

POST	/api/products	Create new product

GET	/api/products/{id}	View single product

PUT	/api/products/{id}	Update product

DELETE	/api/products/{id}	Delete product

🧰 Tools Used

Postman – API testing

GitHub – Version control

MySQL / phpMyAdmin – Database management

VS Code – Development environment

🏁 Conclusion

This Laravel-based backend project provided hands-on experience with building and deploying a functional REST API — simulating a real-world e-commerce backend.
It emphasizes clean architecture, scalability, and secure data handling, preparing developers for professional full-stack projects.
