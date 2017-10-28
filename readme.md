## Setup
install php packages
```
composer install
```

install javascript packages
```
npm install
```

create ```.env``` file, simply duplicate content from ```.env.example``` and modify it

build up database
```
php artisan migrate
```

insert necessary data into database
```
php artisan db:seed
```

generate laravel application key
```
php artisan key:generate
```