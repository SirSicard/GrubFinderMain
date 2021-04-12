# GrubFinderMain

After pulling repo

Terminal:

1. composer install
2. npm install
3. copy paste this code into .env file
#google map api
GOOGLE_MAP_API=AIzaSyCaZupFAsWT2kHqz-v1_F74ehRGFTN125Q
4. create database with name = grubfinder
5. php artisan migrate
6. php artisan db:seed


Users:

1. 'email' => 'mrandersson@admin.com'
   'password' => 'password'

2. 'email' => 'mrsandersson@admin.com'
   'password' => 'password'

After login with admin:

create locations before creating restaurants