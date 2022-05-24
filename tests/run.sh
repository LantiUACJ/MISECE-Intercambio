#!/bin/bash
cd /
cd var/www/html/MISECE-Intercambio
sudo rm .env
wget https://s3intercambio2.s3.amazonaws.com/.env
