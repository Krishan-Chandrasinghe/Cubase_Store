# Cubase Store

A modern web application built with Laravel framework for managing an e-commerce store with user and product management capabilities.

## 🚀 Features

### Core Functionality
- **User Management**: Complete CRUD operations for user accounts
- **Product Management**: Complete CRUD operations for products
- **Image Handling**: Upload, store, and manage images for users and products

### User Features
- Add users and profile management
- Profile picture upload and management

### Product Features
- Add new products with images
- Edit existing product information
- Delete products
- Product categorization and organization

## 🛠️ Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade Templates, HTML, TailwindCSS, JavaScript
- **Database**: MySQL
- **File Storage**: Local filesystem (configurable for cloud storage)
- **Authentication**: Not implemented login system yet.

## 📋 Prerequisites

Before running this project, make sure you have:

- PHP 8.0 or higher
- Composer
- MySQL Database
- Web server (Apache/Nginx) or PHP built-in server

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/cubase-store.git
   cd cubase-store

2. **Install PHP dependencies**
   ```bash
   composer install

3. **Install NPM dependencies (because this project uses Vite)**
   ```bash
   npm install

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate

5. **Configure database**
  - Create a MySQL database
  - Update .env file with your database credentials:
   ```bash
   cp .env.example .env
   php artisan key:generate

6. **Run migrations**
   ```bash
   php artisan migrate

7. **Seed database (optional)**
   ```bash
   php artisan db:seed

8. **Start development server**
   ```bash
   php artisan serve