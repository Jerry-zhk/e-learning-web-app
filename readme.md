## Setup
1. install php packages
```
composer install
```

2. install javascript packages
```
npm install
```

3. create ```.env``` file, simply duplicate content from ```.env.example``` and modify it

4. composer dump autoload map
```
composer dump-autoload
```

5. build up database
```
php artisan migrate
```

6. insert necessary data into database
```
php artisan db:seed
```

7. generate laravel application key
```
php artisan key:generate
```