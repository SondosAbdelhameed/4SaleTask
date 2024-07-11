# 4SaleTask

## Steps to run project
    1- open terminal and run "git clone git@github.com:SondosAbdelhameed/KoinsTask.git"
    2- after project downloaded open it's folder 
    3- copy .env.examble and rename it to .env then open it and update database configration
    4- open new terminal for project folder
    5- run "docker-compose up --build" then run "docker-compose up --d"
    6- run "docker-compose php composer install"
    7- run "docker-compose php php artisan migrate:fresh --seed"
    8- run "docker-compose php php artisan jwt:secret"
    8- run "docker-compose php php artisan serve"
    9- import postman collection to test apis - attached with project in "postman" folder or in mail attachments
    10- add new environmint to 
        base_url => "http://127.0.0.1:8000/api"
        token => the access token that return after login
