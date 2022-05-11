#!/bin/bash
sudo yum update -y
cd /
cd var/www/html/MISECE-Intercambio
sudo rm .env
wget https://s3intercambio2.s3.amazonaws.com/.env
php artisan migrate --force
php artisan config:clear
#php artisan route:clear
#php artisan config:cache
#php artisan route:cache
#php artisan optimize
#sudo -u ec2-user composer install
#sudo -u ec2-user composer dumpautoload -o