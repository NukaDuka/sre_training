docker build -t nukaduka1/custom-xampp .
docker tag nukaduka1/custom-xampp nukaduka1/custom-xampp:arm
docker login
docker push nukaduka1/custom-xampp:arm
