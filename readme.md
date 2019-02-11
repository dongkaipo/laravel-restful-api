# Laravel RESTful Api 

## About

This project installs some common packages for building RESTful apis.

* [Laravel](https://laravel.com/) The PHP Framework For Web Artisans.
* [Dingoapi](https://github.com/dingo/api) A RESTful API package for the Laravel and Lumen frameworks.
* [Laravel Passport](https://laravel.com/docs/5.7/passport) OAuth2 server for laravel.
* [Optimus Id Transformation](https://github.com/jenssegers/optimus) Id obfuscation based on Knuth's multiplicative hashing method for PHP.
* [CORS Middleware for Laravel 5](https://github.com/barryvdh/laravel-cors) Adds CORS (Cross-Origin Resource Sharing) headers support in your Laravel application.

## Usage

1. Clone the project to the local.
```bash
git clone git@github.com:dongkaipo/laravel-restful-api.git project-name
```

2. Update composer packages
```bash
composer update
```

3. Copy the `.env.example` file and configure with your environment

```bash
cp .env.example .env
``` 

4. Generate `APP_KEY` in `.env` file

```bash
php artisan key:generat
```

5. Generate hash id for `OPTIMUS_PRIME`,`OPTIMUS_INVERSE`,`OPTIMUS_RANDOM` in `.env` file

```bash
php vendor/bin/optimus spark
```

* Copy the `Prime` value to `OPTIMUS_PRIME`
* Copy the `Inverse` value to `OPTIMUS_INVERSE`
* Copy the `Random` value to `OPTIMUS_RANDOM`

6. Run laravel migrations

```bash
php artisan migrate
```

7. Run Seeders

```bash
php artisan db:seed
```

8. Install Passport 

```bash
php artisan passport:install
```

9. Import postman file from `laravel-restful-api.json`, configure by your `url`,`oauth client info` to visit `test/welcome`