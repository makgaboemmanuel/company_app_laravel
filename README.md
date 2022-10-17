# bloagapp_laravel
This is a Laravel Application that lets users post content on the blog under specific categories

You need the following configurations before running the application:

- run command: git clone https://github.com/makgaboemmanuel/bloagapp_laravel.git
- download composer from website: https://getcomposer.org/download/
- run the command: composer global require "laravel/installer"
- install XAMPP for windows
- start your XAMPP server
- in your XAMPP MySQL, create the database with the same name and credentials as inside. env file [ 

    DB_CONNECTION=mysql
    DB_DATABASE=contact_app_db
    DB_USERNAME=makgabo
    DB_PASSWORD=makgabo

]
- open the folder where the application is cloned
- run command: php artisan serve --port=8001
- open the the url: http://127.0.0.1:8001/  
