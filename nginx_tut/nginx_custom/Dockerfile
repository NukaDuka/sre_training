FROM ubuntu:focal

COPY ./data .
COPY ./systemd/nginx.service /lib/systemd/system/nginx.service

ENV TERM=xterm-256color
ARG DEBIAN_FRONTEND=noninteractive

RUN bash -c 'apt-get update && apt-get install -y curl gnupg2 ca-certificates lsb-release python3-pip libpcre3 libpcre3-dev zlib1g zlib1g-dev libssl-dev && \
    echo "deb http://nginx.org/packages/mainline/ubuntu `lsb_release -cs` nginx" \
    | tee /etc/apt/sources.list.d/nginx.list && \
    curl -fsSL https://nginx.org/keys/nginx_signing.key | apt-key add - && \
    apt-get update && apt-get install -y nginx && python3 -m pip install -r requirements.txt && nginx'

CMD bash -c 'nginx && python3 hc.py'
