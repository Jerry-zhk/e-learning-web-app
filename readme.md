## Setup
1. To install php packages, run
```
composer install
```

2. To install javascript packages, run
```
npm install
```

3. Create ```.env``` file, duplicate content from ```.env.example``` and modify MySQL settings, then run 
```
php artisan config:clear
```

4. composer dump autoload map
```
composer dump-autoload
```

5. Build up database tables
```
php artisan migrate
```

6. Insert necessary data into database
```
php artisan db:seed
```

7. Generate Laravel application key
```
php artisan key:generate
```