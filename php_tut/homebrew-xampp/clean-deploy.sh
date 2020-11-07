#!/bin/bash

docker stack rm homebrew-xampp
sudo docker network rm xampp-network
sudo docker network create --attachable -d overlay xampp-network

sudo docker volume rm xampp-mariadb-volume
sudo docker volume create xampp-mariadb-volume
sudo docker volume rm xampp-pma-volume
sudo docker volume create xampp-pma-volume


sudo docker secret rm xampp-mariadb-pwd
sudo docker secret create xampp-mariadb-pwd -

docker stack deploy -c ./docker-compose.yml homebrew-xampp
