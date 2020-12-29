set -x
docker build --rm -t nukaduka1/custom-redis .
docker tag nukaduka1/custom-redis nukaduka1/custom-redis:latest
docker login
docker push nukaduka1/custom-redis:latest
set +x