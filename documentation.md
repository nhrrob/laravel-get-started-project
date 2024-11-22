# Project Setup
- [optional] If you face issues with vite feel free to download the version this drive link (as size is 150MB; couldn't push to another branch)
Drive Link: https://drive.google.com/file/d/1miyXjPpCnP8C4cSF217mu13lP_wR6_q1/view?usp=share_link 
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

## Remove default/existing product crud
- Run below commands
```
- php artisan crud:generator:delete
- php artisan crud:generator:delete --admin
```
- Add `Product` as Model title
