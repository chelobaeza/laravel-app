# Laravel project 
Created with jetstream and Inertia with SQLite

# create the laravel project
```
docker compose run --rm composer create-project laravel/laravel jetstream-app
```
`cd jetstream-app && mv compose.yml` 

# Install jetstream
add jetstream packages
```
docker compose run --rm composer require laravel/jetstream
```

install jetstream with inertia
```
docker compose run --rm php artisan jetstream:install inertia
```

# Run the project
install laravel dependencies 
```
docker compose run --rm composer install
```

install node dependencies
```
npm install
```

run migrations to update database schema
```
docker compose run --rm php artisan migrate
```

start the server using artisan on [http://localhost:8000]
```
docker compose up serve
```

start the vite server
```
npm run dev
```


# Operations
## create model
```
docker compose run --rm php artisan make:model Post -mcr
```
## create migration 
```
docker compose run --rm php artisan make:migration update_post_table --table="posts"
```