<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

#### Server Requirements
* PHP 8.x
* Apache 2.x
* Mysql 8.x
* Composer 2.x

#### Installation steps

##### 1. Install packages
```sh
$ composer install
```
##### 2. Install jwt-auth
```sh
$ composer require tymon/jwt-auth
```
##### 3. update composer
```sh
$ composer update
```

##### 4. Copy .env.example and create .env file
```sh
$ sudo cp .env.example .env
```
##### 5. Update database connection in .env
##### 6. Create tables using laravel migration
```sh
$ php artisan migrate
```
##### 7. Run seeders for initial database entries.
```sh
$ php artisan db:seed
```
##### 8. Generate key
```sh
$ php artisan key:generate
```
##### 9. Change storage directory permission
```sh
$ sudo chmod -R guo+w storage
```
##### 10. Create symbolic link of storage/app/public directory
```sh
$ php artisan storage:link
```
##### 11. Check in browser: http://localhost/basecode_laravel/code/public
##### 12. Backend Url: http://localhost/basecode_laravel/code/public/backend

