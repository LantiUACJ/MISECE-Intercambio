#!/bin/bash
cd /
cd var/www/html/MISECE-Intercambio
sudo rm .env
aws s3 cp s3://s3intercambio2/.env /var/www/html/MISECE-Intercambio/
