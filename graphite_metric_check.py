import urllib3
import json
import logging
import sys


default_graphite_host='play.grafana.org/api/datasources/proxy/1/'
def check_metric(graphite_metric_target, graphite_host=default_graphite_host, graphite_port=443, warning_threshold=25, critical_threshold=28):
    url = 'https://' + default_graphite_host + '/render?target=' + graphite_metric_target + '&format=json&from=-5min'
    http = urllib3.PoolManager()
    r = http.request('GET', url)
    jsondata = json.loads(r.data)
    
    warningflag = False
    if (len(jsondata) < 1):
        logging.error('No targets found, aborting with error code 2')
        sys.exit(2)
    for dict in jsondata:
        if len(dict['datapoints']) < 1:
            logging.error('Too few datapoints, aborting with error code 2')
            sys.exit(2)
        for pt in dict['datapoints']:
            if pt[0] >= critical_threshold:
                logging.critical('Data above critical threshold: ' + str(pt[0]) + ', aborting with error code 2')
                sys.exit(2)
            elif pt[0] >= warning_threshold:
                warningflag=True
                logging.warning('Data above warning threshold:' + str(pt[0]))
           
    if warningflag:
        logging.warning('Data has crossed warning threshold, aborting with error code 1')
        sys.exit(1)
    logging.info('Data is nominal, exiting with error code 0')
    sys.exit(0)
        
if __name__ == '__main__':
    check_metric('aliasByNode(movingAverage(scaleToSeconds(apps.fakesite.*.counters.requests.count,%201),%202),%202)')
