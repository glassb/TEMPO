
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
