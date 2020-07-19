import logging
import sys
import argparse

globalLevel = logging.INFO
def configureLog(name=None, level=logging.DEBUG, isFile=False, stream=sys.stdout, filename='log.log'):
    dbgFormat = logging.Formatter(fmt='%(asctime)s - (ConfigureLog) %(levelname)s: %(message)s', datefmt='%Y-%m-%d %H:%M:%S')

    if isFile:
        dbgHandler = logging.FileHandler(filename, 'a')
    else:
        dbgHandler = logging.StreamHandler(stream)

    dbgHandler.setLevel(globalLevel)

    dbgHandler.setFormatter(dbgFormat)

    dbgLogger = logging.getLogger('dbgLogger')
    dbgLogger.setLevel(globalLevel)
    dbgLogger.addHandler(dbgHandler)
    dbgLogger.propagate = False

    if name == None:
        dbgLogger.debug('Returning root logger')
    else:
        dbgLogger.debug('Returning logger for function ' + name)

    
    formatter = logging.Formatter(fmt='%(asctime)s - (%(name)s) %(levelname)s: %(message)s', datefmt='%Y-%m-%d %H:%M:%S')
    if isFile:
        handler = logging.FileHandler(filename, 'a')
    else:
        handler = logging.StreamHandler(stream)
    
    handler.setFormatter(formatter)
    handler.setLevel(level)
    logger = logging.getLogger(name)
    logger.propagate = False
    logger.setLevel(level)
    if len(logger.handlers) > 0:
        dbgLogger.error('Handler already present for logger ' + name)
        handler = dbgLogger.handlers[-1]
    else:
        logger.addHandler(handler)
    dbgLogger.removeHandler(dbgHandler)
    
    return logger, handler, formatter


def func(num=0, isFile = False, filename='log.log'):
    if (num == 10):
        return
    logger, _, _ = configureLog(func.__name__+str(num), isFile=isFile, filename=filename)
    logger.info('hi this is func')
    func(num+1, isFile, filename)

if __name__ == '__main__':
    parser = argparse.ArgumentParser(description='This program does random stuff and outputs it to either a file or a stream.')
    parser.add_argument('-f', '--file', default=None, help="If this argument is provided, the program will store the log in a file instead of sending it to a stream.")
    parser.add_argument('-s', '--stream', default='stdout', help='Output stream. If the -f argument is provided, this argument will be ignored')
    args = parser.parse_args()
    # stream argument is ignored for now
    isFile = args.file != None 
    filename = args.file

    logger, h, _ = configureLog('1', isFile=isFile, filename=filename)
    logger2, h, _ = configureLog('1', isFile=isFile, filename=filename)
    logger.info('I am number one')
    func(isFile=isFile, filename=filename)
    for i in range(2, 12):
        l, _, _ = configureLog(str(i), logging.INFO, isFile=isFile, filename=filename)
        l.info("Look at me, I'm " + str(i))
