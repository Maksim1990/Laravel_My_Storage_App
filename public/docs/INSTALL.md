**HOT TO INSTALL APP**
--
     
* *Start app and build required Docker containers:*

        docker-compose up -d
      
* *Install all composer dependencies:*

        docker exec -it larastorage_php composer install
        
* *Copy ``.env`` environment config file and set all required settings in it:*

        docker exec -it larastorage_php cp .env.dist .env

* *Generate Laravel application key:*

        docker exec -it larastorage_php php artisan key:generate
        
* *Run all required migrations:*

        docker exec -it larastorage_php php artisan migrate
  
* *Install NodeJS dependencies and compile assets:*
    
        docker exec -it larastorage_php  npm install
        docker exec -it larastorage_php  npm run dev
        
* *Update Algolia indexes for User, Book & Movie models:*
    
        docker exec -it larastorage_php  php artisan scout:import "App\User"
        docker exec -it larastorage_php  php artisan scout:import "App\Book"
        docker exec -it larastorage_php  php artisan scout:import "App\Movie"

* *Change permission for 'storage' folder:*
    
        docker exec -it laravel_api  chmod +x ./services/docker/set_storage_read_write_permissions.sh
        docker exec -it laravel_api  ./services/docker/set_storage_read_write_permissions.sh

App is available on ``8302`` port
--
    http://127.0.0.1:8302
    
#####In order to import some already predefined dummy data than use following dump:

    docker/mysql/discover_storageapp.sql
