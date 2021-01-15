
## Laravel git Command


## Laravel Docker Command

### Create Models
docker-compose exec schicher_app php artisan make:model Models/UserType

### Seed
docker-compose exec schicher_app php artisan make:seeder UserTypeSeeder

docker-compose exec schicher_app php artisan db:seed --class=UserTypeSeeder
