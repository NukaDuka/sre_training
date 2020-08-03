FROM ubuntu

RUN apt-get update -y
RUN apt-get install python3 -y
RUN apt-get install python3-pip -y
RUN apt-get install net-tools -y
RUN apt-get install -y iputils-ping

RUN pip3 install flask 
RUN pip3 install flask-mysql 
RUN pip3 install requests

COPY . /opt/source-code

CMD python3 /opt/source-code/app.py 