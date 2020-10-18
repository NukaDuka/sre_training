#!/bin/bash
sudo docker login -u nukaduka1 -p $DOCKER_LOGIN_PASSWD
sudo docker build --pull --rm -t nukaduka1/nginx_custom .
sudo docker push nukaduka1/nginx_custom:latest
