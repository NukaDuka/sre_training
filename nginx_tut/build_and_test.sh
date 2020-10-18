#!/bin/bash
sudo docker build --pull --rm -t nukaduka1/nginx_custom .

sudo docker rm --force nginx-custom
sudo docker run -d --name nginx-custom -p 80:80 -p 8081:81 --health-cmd='curl -s localhost:81 || exit 1' --health-interval=10s  --health-start-period=5s nukaduka1/nginx_custom:latest
