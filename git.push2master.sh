#!/bin/bash
sudo chown -R www-data:www-data /var/www/*
git add -A
git commit -m "dev $(date) release"
git push git@github.com:kitchenseeker/www.git origin development:master
