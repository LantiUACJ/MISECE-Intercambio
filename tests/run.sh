#!/bin/bash
cd /
cd var/www/html/MISECE-Intercambio
sudo rm .env
wget https://s3intercambio2.s3.amazonaws.com/.env
php artisan migrate --force
php artisan config:clear
sudo -u ec2-user composer install

