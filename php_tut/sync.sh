#!/bin/bash
# Intended to be run from within the code folder
set -ex
docker run -d --rm --name dummy -v xampp-pma-volume:/root alpine tail -f /dev/null
docker cp ./code dummy:/root/
docker stop dummy