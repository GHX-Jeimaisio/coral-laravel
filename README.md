# Coral Exam - Laravel #

Backend built in PHP Laravel.
### Requirements
1. Composer
2. NPM
3. PHP >= 7.2
4. MySQL

### Local machine setup ###
1. Clone repo: https://github.com/GHX-Jeimaisio/coral-laravel
2. Change directory inside the project folder. Run `cd coral-laravel`
3. Copy `.env.example` to `.env` (Create new file for .env).
4. Run `composer install` 
5. Create database to your local. DB name depends on DB_DATABASE on your .env, current value is `exam_coral`.
6. Run `php artisan config:cache`
7. Run `php artisan migrate`
8. Run `npm install`
9. Run `npm run dev`
10. Run `php artisan serve`. Laravel development server started: http://127.0.0.1:8000