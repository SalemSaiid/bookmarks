# Card Game test with Docker, Symfony5 and Angular11

This is a simple project (Card Game) 

## installation & Starting 
These instructions apply if you installed:
  - The Docker App, i.e., if you are using macOS, Linux or Windows Pro/Enterprise/Education.
  
1. First, download the , either directly or by cloning the repo.
1. Run in the root folder **docker-compose up --build --force-recreate** to prepare the environment (Angular, Apache, PHP7, Mysql, phpMyAdmin, Insert fixtures data).
1. Now that installation is complete, you can test :)<br><br>
    # Back:<br>
     - URL phpMyAdmin : http://localhost:8000 
         <br> user: root 
         <br> password: password  <br>   
         
     - Unit Tests: 
                  bin/phpunit<br>
   # Front:  <br>
     - URL Project with Angular: http://localhost:9898/<br>
     - Not Found page: http://localhost:9898/notfound-ozozo<br>
     - Tests: 
         npm run lint<br>
         npm run test<br>
         npm run e2e<br><br>
      - Production<br>
         npm run build    
     
 # If you need to re-install, run these commands:
 -  docker-compose stop    <br>
 -  docker-compose rm    <br>
 -  docker volume prune --force  <br>
 -  docker-compose up --build --force-recreate 

 
# Useful Commands:
# Access Bash<br>
  docker-compose exec www bash
# run Symfony Commands (console)
  docker container exec -it back-container CARDGAME/bin/console doctrine:schema:update --force <br>
# run composer install<br>
  docker container exec -it back-container sh -c "cd CARDGAME && php composer.phar install"
# Mysql Commands
 docker-compose exec db mysql -uroot -p"password"
 # Check CPU consumption
 docker stats $(docker inspect -f "{{ .Name }}" $(docker ps -q))
