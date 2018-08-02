"""
Created 6/24/2018
Last Updated 7/17/2018
"""



#___setup_____________________________________________________________________
import RPi.GPIO as GPIO
import pigpio
import sys
import time
import datetime
import smtplib
from subprocess import check_output, call
import MySQLdb

pi = pigpio.pi()

t = time.localtime()

suite_id = "Townhouse North 1"


#___web scraping______________________________________________________________
# logs onto the automated logic website, navigates to the proper page, grabs the current kW consumption
def get_data():

    try:
        start = time.time()

        db = MySQLdb.connect(host="jackrabbit", user="highpeaksdw", passwd="naivecuriousarcanebionic", db="highpeaksdw")
        cursor = db.cursor()
        query = ("""SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 1)""")
        cursor.execute(query)
        kw = float(cursor.fetchone()[0])
        return kw

        cursor.close()
        db.close()
        

    except:
        print "There has been an interruption in the data gathering process."
        time.sleep(10)
        send_email("The Pi was unable to retrieve the data.")
        time.sleep(10)
        kw = get_data(building, suite)
        return kw



#___led strip_________________________________________________________________________
# activates the LED strip based on the current consumption
def light_stuff(kw):
    #calculates a brightness level for the red based on the kW consumption.
    #the final number (currently 4) is what is considered "high"
    print "The current kW consumption of " + suite_id + " is: " + str(kw)
    red = int(round((kw*250)/4)) 
    if red > 250:
        red = 250
    green = 250-red #makes green the inverse
    print "Red brightness: " + str(red)
    print "Green brightness: " + str(green) 
    print "Total: " + str(red+green) + "\n"

    #send the message to the LED strip
    pi.set_PWM_dutycycle(25, red)
    pi.set_PWM_dutycycle(12, green)



#___email________________________________________________________________________________
def send_email(body):
    import smtplib

    gmail_user = "middconpsych"
    gmail_pwd = "townhouse17"
    recipient = "middconpsych@gmail.com"
    
    FROM = gmail_user
    TO = recipient if type(recipient) is list else [recipient]
    SUBJECT = suite_id
    TEXT = body

    message = """From: %s\nTo: %s\nSubject: %s\n\n%s
    """ % (FROM, ", ".join(TO), SUBJECT, TEXT)
    try:
        server = smtplib.SMTP("smtp.gmail.com", 587)
        server.ehlo()
        server.starttls()
        server.login(gmail_user, gmail_pwd)
        server.sendmail(FROM, TO, message)
        server.close()
        print 'successfully sent the mail'
    except:
        print "failed to send mail"



#___find current ip____________________________________________________________________
def find_ip():
    scanoutput = str(check_output(["ifconfig"]))

    for line in scanoutput.split():
        if line.startswith("140"):
            ip = line
            
    return ip


#__check wifi__________________________________________________________________________
def check_wifi():

    try:
        scanoutput = check_output(["iwgetid", "-r"])
    
        if scanoutput != "MiddleburyCollege\n":
            print "You are NOT connected to the correct WiFi network.\n"
            print "Disconnecting from wrong network...\n"
            call(["sudo", "ifdown", "wlan0"])
            call(["sudo", "killall", "wpa_supplicant"])
        
            time.sleep(5)

            print "Connecting to MiddleburyCollege."

            call(["sudo", "wpa_supplicant", "-B", "-c",
                  "/etc/wpa_supplicant/wpa_supplicant.conf", "-i", "wlan0"])

            time.sleep(15)
        
            send_email("Successfully re-connected to MiddleburyCollege.\n" + "Time: " + str(time.ctime()))

    except:
        print "Sleeping. Waiting for WiFi to reconnect."
        time.sleep(60)
        send_email("The device experienced difficulty connecting to wifi.")
        check_wifi()
        

#___when run___________________________________________________________________________
# user input: what shows up when the program is run

def main():
    counter = 1
    send_email("The LED strip has been turned on.\n" + "Current IP address: " + str(find_ip()))
    start_time = time.time()
    try:
        while True:
            t = time.localtime()
            if t[3] >= 23 or t[3] < 7:
                print time.ctime()
                print "Sleepy time. The LED is off.\n"
                pi.set_PWM_dutycycle(25, 0)
                pi.set_PWM_dutycycle(12, 0)
                pi.set_PWM_dutycycle(21, 0)
                time.sleep(3600)
            else:
                check_wifi()
                print "Start time: " + time.ctime(start_time) + "   -   Current time: " + time.ctime()
                print "Time since start: " + str(datetime.timedelta(seconds=(time.time()-start_time)))
                print "Updates since start: " + str(counter)
                counter = counter + 1
                actual_data = get_data()
                light_stuff(actual_data)
                time.sleep(60)
    except KeyboardInterrupt:
        send_email("The LED strip has been turned off.")
        pi.set_PWM_dutycycle(25, 0)
        pi.set_PWM_dutycycle(12, 0)
        pi.set_PWM_dutycycle(21, 0)
        pi.stop()
        print "\n", "Keyboard Interrupt.", "\n"


main()





