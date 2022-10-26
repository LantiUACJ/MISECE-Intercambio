#!/bin/bash
sudo yum update -y > /dev/null 2> /dev/null < /dev/null &
cd /
cd var/www/html/MISECE-Intercambio
sudo rm .env
echo removed 
sudo aws s3 cp s3://s3intercambio2/.env /var/www/html/MISECE-Intercambio/ > /dev/null 2> /dev/null < /dev/null &
sudo chown -R ec2-user ./composer.lock
echo composerpreview
sudo -u ec2-user composer update > /dev/null 2> /dev/null < /dev/null &
echo composer > composer.txt
php artisan migrate --force > migrate.txt
echo artisan
echo success!