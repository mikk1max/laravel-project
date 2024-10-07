# Online Game Store with Chat

This project is a Laravel-based online store where users can order games, interact via chat, and enjoy a seamless shopping experience.

## Installation

### 1. Install XAMPP & Composer

1.1 Download and install [XAMPP](https://www.apachefriends.org/download.html), which includes PHP, MySQL, and Apache. Select PHP and MySQL components during installation.

1.2 Extract the `app-name.zip` project file and copy the folder containing necessary project files to `htdocs` in your XAMPP installation directory.

1.3 Start Apache and MySQL services using the XAMPP Control Panel. Open `phpMyAdmin` in your browser, and create a new database named `app`.

1.4 Download and install [Composer](https://getcomposer.org/download/). During installation, choose the PHP executable located in `xampp/php/php.exe`.


### 2. Verify Installations & Versions

2.1 Ensure PHP version ^8.1 is installed (e.g., PHP 8.3).

2.2 Open cmd, navigate to your project folder (`cd pathToProjectFolder`), and execute the following commands:
   
   ```bash
   composer self-update --2
   composer update
   composer -v
   ```


### 3. Migration & Run Server

3.1 Open your project in an IDE (e.g., PhpStorm).

3.2 Modify the `.env` file: Set `DB_DATABASE=app` and ensure other database configurations (`DB_CONNECTION=mysql`, `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_USERNAME=root`, `DB_PASSWORD=`).

3.3 Run migrations: Open cmd, navigate to your project folder, and execute:
```php artisan migrate```

Verify new tables in phpMyAdmin.

3.4 Start the server: Run `php artisan serve` and visit `localhost:8000` in your browser.

## Completion

If all steps completed without errors, the App-Name online store is now operational. Test all features and functionalities. For further assistance, contact [maksim.shepeta@gmail.com](mailto:maksim.shepeta@gmail.com).

<a href="https://www.buymeacoffee.com/mikkimax" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

