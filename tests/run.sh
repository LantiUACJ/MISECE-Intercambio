#!/bin/bash
cd /
cd var/www/html/MISECE-Intercambio
php artisan migrate --force
php artisan config:clear
#php artisan route:clear
#php artisan config:cache
#php artisan route:cache
#php artisan optimize
sudo -u ec2-user composer install
sudo -u ec2-user composer dumpautoload -o
sudo yum update -y
