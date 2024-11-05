# Project Setup

- copy .env.example to .env
- add database details
- generate app key 
```
php artisan key:generate
```
- Reset DB with Seed: 
```
php artisan migrate:fresh --seed
```
- composer update
- npm install
- npm run dev
- siteurl/admin/products
- It uses laravel/breeze
- For api, sanctum is used instead of passport
- after creating crud: update migration and then migrate
```
$table->string('title');
```