# CodeIgniter 4 Application Starter

##

Login

![login](https://user-images.githubusercontent.com/68773769/122013364-4cd3fc80-cde8-11eb-937e-fc1aa0d50bdb.jpg)

Admin Dashboard

![admin](https://user-images.githubusercontent.com/68773769/122013385-53fb0a80-cde8-11eb-8ff5-8549960bf3de.jpg)

Petugas Dashboard

![petugas](https://user-images.githubusercontent.com/68773769/122013410-5a898200-cde8-11eb-9f5c-3552b3d2e4ac.jpg)

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

## Installation & updates

`git clone https://github.com/rikoputrap/ci4laundry`
`composer install`

## Setup

buat database dengan nama ci4laundry

ubah `env` ke `.env`

ubah `# CI_ENVIRONMENT = production` menjadi `CI_ENVIRONMENT = development` di `.env`

hapus # di pada semua `database.default` di `.env`

tambahkan `ci4laundry` ke `database.default.database` di `.env`

dan atur sesuai database yang kamu punya

`php spark migrate`

`php spark db:seed AdminSeeder` untuk membuat username = admin, dan password = admin

atau `php spark db:seed TestSeeder` untuk membuat username = admin, petugas dan password admin, petugas beserta dummy data lainnya

hapus # dan tambahkan `http://localhost:8080/` ke app.baseUrl di `.env`

`php spark serve`

## Server Requirements

Composer

MySQL

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
