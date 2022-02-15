copy .env.example and rename to .env 

cd entry
cd docker
docker-compose up -d


wait when build


docker exec -it pms-app bash
cd entry
composer update


connect to DB 
User pms
Password secret
Database pms


php artisan migrate

PHPSTORM configuration
got to File->Settings
 1.PHP  
    Configuration file set path to the docker/docker-compose.yml
    Service : container php (app)
    Important!
    General should be updated to php installed version, and Xdebug installed version
    ![php](../master/readmeSoutce/php.png)

