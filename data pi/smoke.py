from mq import *
import sys, time
import urllib2, urllib
import MySQLdb

conn = MySQLdb.connect(host="192.168.137.1", user="root", passwd="",db="dbasap")
cursor = conn.cursor()


try:
    print("Press CTRL+C to abort.")
    
    mq = MQ();
    while True:
        perc = mq.MQPercentage()

        query = "INSERT INTO sensor_asap (asap) VALUES (%s)" % (str(perc["SMOKE"]))
        try:
            cursor.execute(str(query))
            conn.commit()
        except:
            conn.rollback();

        sys.stdout.write("\r")
        sys.stdout.write("\033[K")
        sys.stdout.write("LPG: %g ppm, CO: %g ppm, Smoke: %g ppm" % (perc["GAS_LPG"], perc["CO"], perc["SMOKE"]))
        sys.stdout.flush()
        time.sleep(15)

except Exception as e:
    print(e)