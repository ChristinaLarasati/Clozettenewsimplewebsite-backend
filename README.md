# Clozette New Simple Website - Backend

## Getting Started
To create a project from this repository :

* Clone this project using this url : https://github.com/ChristinaLarasati/Clozettenewsimplewebsite-backend with **git clone projectURL** or using third party software like SourceTree
* Open .env file
* Make a new database
* Set .env file with your database's name in line "DB_USERNAME="
* Open a new terminal and make **composer install**
* After installing the composer, then **npm install**
* Generate key with **php artisan key:generate**
* To get tables : **php artisan migrate**
* If migration's success, make **php artisan serve**
* Then copy the link into your browser, and the project will be ready to be used.
* Make sure, register into the project first, but you may use dummy table values using **php artisan db:seed**

