set -x
docker build --rm -t nukaduka1/custom-xampp .
docker tag nukaduka1/custom-xampp nukaduka1/custom-xampp:latest
docker login
docker push nukaduka1/custom-xampp:latest
set +x