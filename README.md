## Job Application System

### Setup Steps

1. Clone the repository
2. Copy `.env.example` to `.env`
3. Create database and update `.env`
4. Setup mail credentials in `.env`
5. run following commands 
```
composer install
npm install
php artisan key:gen
php artisan migrate --seed
php artisan serve 
```

#### Credentials
- email : admin@admin.com
- passwor : password
