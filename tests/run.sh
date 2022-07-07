#!/bin/bash
cd /
cd var/www/html/MISECE-Intercambio
sudo rm .env
echo removed 
sudo aws s3 cp s3://s3intercambio2/.env /var/www/html/MISECE-Intercambio/ > /dev/null 2> /dev/null < /dev/null &