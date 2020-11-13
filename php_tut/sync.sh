#!/bin/bash
# Intended to be run from within the code folder
sudo cp -R . /var/lib/docker/volumes/xampp-pma-volume/_data/code
sudo rm /var/lib/docker/volumes/xampp-pma-volume/_data/code/sync
