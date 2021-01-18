
## Laravel git Command
git pull origin develop
git push origin develop

## First Project
docker-compose exec schicher_app composer install

docker-compose exec schicher_app npm install

## Laravel Docker Command

### Migrate database
docker-compose exec schicher_app php artisan migrate

### Create Models
docker-compose exec schicher_app php artisan make:model Models/UserType

### Seed
docker-compose exec schicher_app php artisan make:seeder UserTypeSeeder

docker-compose exec schicher_app php artisan db:seed --class=UserTypeSeeder
