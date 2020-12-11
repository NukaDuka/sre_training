#!/bin/bash
set -ex
echo $PWD
docker run -d --rm --name dummy -v xampp-pma-volume:/root alpine tail -f /dev/null
docker cp ./code dummy:/root/
docker exec dummy rm "/root/$(git rev-parse HEAD~)"
docker exec dummy touch "/root/$(git rev-parse HEAD)"
docker stop dummy