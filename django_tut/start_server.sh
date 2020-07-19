ip a | grep eth0 | grep inet | cut -d' ' -f6 | cut -d/ -f1 | xargs -I {} python manage.py runserver {}:8000
