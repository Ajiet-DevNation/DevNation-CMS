# Setup Guide for DevNation CMS

<p align="center">
     <img src="https://github.com/user-attachments/assets/03765de4-b19f-42a9-9508-3b0dd087f40a"> 
</p>

## Overview

This document provides a comprehensive guide to setting up the DevNation-CMS project on your local machine. It includes prerequisites, common errors, and instructions for running the application, helping you get started quickly.

## Prerequisites

Before you begin, ensure you have the following installed on your computer:

- **GitHub Account**: If you don’t have one, you can create it [here](https://github.com/join).
- **Visual Studio Code** (or any other code editor): Download it [here](https://code.visualstudio.com/download).
- **Git version control**: Download it [here](https://git-scm.com/downloads).
- **PHP**: Install the latest version of PHP. You can download it [here](https://www.php.net/downloads) or use a package like XAMPP or WAMP.
- **Composer**: Install Composer, a dependency manager for PHP, which you can download [here](https://getcomposer.org/download/).
- **Node.js**: Install Node.js for managing JavaScript dependencies.

### Detailed Node.js Installation

Node.js is a JavaScript runtime built on Chrome's V8 JavaScript engine, which enables you to run JavaScript code outside of a web browser. To install Node.js, follow these steps:

1. **Download Node.js**:
   - Visit the official [Node.js website](https://nodejs.org/en/).
   - You will see two versions available for download: LTS (Long Term Support) and Current. For most users, the **LTS version** is recommended as it is more stable.

2. **Install Node.js**:
   - After downloading the installer, run it.
   - Follow the on-screen instructions in the installer:
     - Accept the license agreement.
     - Choose the installation path (you can keep the default).
     - Ensure that the option to install **Node.js** and **npm** (Node Package Manager) is checked.

3. **Verify the Installation**:
   - Open your terminal (Command Prompt or PowerShell on Windows, Terminal on macOS/Linux).
   - Run the following commands to verify that Node.js and npm have been installed successfully:
     ```bash
     node -v
     ```
     ```bash
     npm -v
     ```
   - Both commands should return version numbers, confirming that the installation was successful.

### Setting Up XAMPP

To run Laravel applications locally, you can use either XAMPP or WAMP as your PHP server environment. Follow the steps below for installation:

#### XAMPP Installation

1. **Download XAMPP**: Visit the [XAMPP website](https://www.apachefriends.org/index.html) and download the installer for your operating system.
2. **Install XAMPP**: Run the installer and follow the on-screen instructions.
3. **Start Apache and MySQL**: Open the XAMPP Control Panel and start the Apache and MySQL services.

## Roadmap for Setting Up DevNation CMS

1. **Check out the `contribution.md` file**: This file contains important instructions for contributing to the project, including how to fork and clone the repository.

2. **Set Up Environment Variables**:
   - Copy the `.env.example` file to create your own `.env` file:
     ```bash
     cp .env.example .env
     ```
   - Open the `.env` file in a code editor and update it with the necessary environment variables for your local setup. Ensure you specify your database connection details, such as:
     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

3. **Install Dependencies**:
   - Open your terminal (or command prompt) and navigate to the root directory of your cloned repository. Run the following command to install all necessary PHP packages:
     ```bash
     composer install # Check for any errors during installation
     ```
   - This command reads the `composer.json` file in your project directory and installs all required dependencies into the `vendor` folder.

4. **Run Migrations**:
   - If the project uses a database, run the migrations to set up the database schema:
     ```bash
     php artisan migrate
     ```
   - This command creates the tables defined in your migration files in the database specified in your `.env` file.

5. **Seed the Database**:
   - If you want to populate your database with initial data:
     - Go to the `/database` directory and create a file named `database.sqlite`. Then run:
     ```bash
     php artisan migrate:fresh --seed
     ```
   - The `migrate:fresh` command drops all existing tables and then runs all migrations again, followed by seeding the database with initial data defined in your seed classes.

6. **Start the Application**:
   - You can now run the application using the Laravel development server. Execute the following command:
     ```bash
     php artisan serve
     ```
   - By default, this will start the server at `http://localhost:8000`. You can also access it at `http://127.0.0.1:8000`.

## Common Errors and Troubleshooting

- **Error: `Failed to connect to database`**
  - Ensure your database credentials in the `.env` file are correct. Verify that the database you specified exists and that the username and password are accurate.

- **Error: `Class 'App\Http\Controllers\Controller' not found`**
  - This may indicate a missing namespace or an issue with autoloading. Run the following command to refresh the autoloader:
    ```bash
    composer dump-autoload
    ```

- **Error: `composer install` fails**
  - Ensure you have Composer installed correctly. You can check if Composer is installed by running:
    ```bash
    composer --version
    ```
  - If it’s not recognized, revisit the [Composer installation guide](https://getcomposer.org/download/) to resolve any issues.

- **Error: `npm install failed`** (if applicable)
  - If your project has a `package.json` file and you need to install JavaScript dependencies, ensure you have Node.js and npm installed. Check the Node.js version by running:
    ```bash
    node -v
    ```
  - If it's outdated, consider updating Node.js.

- **Error**: `laravel\framework` ![Error Screenshot](https://github.com/user-attachments/assets/8f111bb8-6714-4b4b-945e-0e2381ec5e91)  
  - If your project encounters this type of error, navigate to the installed PHP directory and open the `php.ini` file. Make the following changes:
    ```bash
    ;extension=intl   # Change this line to:
    extension=intl

    ;extension=fileinfo  # Change this line to:
    extension=fileinfo
    ```

- **Error**: `Composer certificate error` ![Error Screenshot](https://github.com/user-attachments/assets/c79ca3de-dcb7-4111-ac90-ec1fa8b87bc1)  
  - To resolve this error, reinstall Composer from the [official Composer website](https://getcomposer.org/download/). Additionally, ensure you download the latest version of PHP from the [official PHP website](https://www.php.net/downloads) and update your environment variables accordingly.

## Conclusion

Following this setup guide will help you establish a local environment for the DevNation CMS project quickly and efficiently. If you encounter any issues not covered in this guide, feel free to raise an issue in the repository or seek assistance from the community.

Happy coding!