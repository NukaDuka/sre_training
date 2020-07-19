ip a | grep inet | grep eth0 | cut -d' ' -f6 | cut -d/ -f1
