# This is the back-end of Berasku web application

## This project comprised of many technologies but the main core component is laravel for the back-end framework.

The prerequisites to run this project (Mac x86):
1. Mysql server - https://dev.mysql.com/downloads/mysql/.

2. Php server.

3. Composer - https://getcomposer.org/download/.

4. Laravel - https://laravel.com/docs/9.x/installation.

Once all of the packaged above are installed. Then run open the terminal and run the following commands:

1. Go to a directory, copy and enter the following: git clone https://github.com/figoaranta/WebDevFinal-BerasKu-

2. cd to the project directory and run composer update

3. Then migrate all the database with php artisan migrate (Add mysql credentials in the .env file)

4. And lastly, run php artisan serve.

## The technologies used in this project

### &nbsp ◉ Laravel - Back-end framework for the MVC architecture design pattern.

###     ◉ React JS - Javascript library for developing the front-end part of the application. https://github.com/marcellhardja/beraskufrontend.

###     ◉ JWT - for sharing security information between server and clients. 

###     ◉ CircleCI - To enable continuous integration and development.

###     ◉ AWS S3 - for storing image assets (user profile images, product images,etc.)

###     ◉ Stripe - To enable payment trasactions for the purchased products.

###     ◉ Heroku - Hosting the web application.

###     ◉ ClearDB - Database for storing information related to the application.

