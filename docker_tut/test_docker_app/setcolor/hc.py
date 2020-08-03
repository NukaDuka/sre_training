import requests
import sys

url = 'http://127.0.0.1:8081'

r = requests.get(url, headers={'user-agent':'health_checker/1.0'})
if r.status_code == 200:
    sys.exit(0)
sys.exit(1)