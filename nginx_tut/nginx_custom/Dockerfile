FROM ubuntu:focal

COPY . .
RUN apt-get update && apt-get install -y curl gnupg2 ca-certificates lsb-release python3-pip
RUN echo "deb http://nginx.org/packages/mainline/ubuntu `lsb_release -cs` nginx" \
    | tee /etc/apt/sources.list.d/nginx.list
RUN curl -fsSL https://nginx.org/keys/nginx_signing.key | apt-key add -
RUN apt-get update && apt-get install -y nginx && python3 -m pip install -r requirements.txt

CMD ["python3", "hc.py"]
