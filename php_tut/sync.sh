#!/bin/bash

docker stop dummy
set -ex
docker run -d --rm --name dummy -v xampp-pma-volume:/root alpine tail -f /dev/null
docker -D cp ./code dummy:/root/
docker exec dummy rm -f "/root/$(git rev-parse HEAD~)"
docker exec dummy touch "/root/$(git rev-parse HEAD)"
docker stop dummy