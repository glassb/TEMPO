# TEMPO
<b>Energy Monitoring System for Townhouse Suites on Middlebury College's Campus</b>

TEMPO (Townhouse Energy Monitoring Project) was initiated in Fall of 2016 by Thomas Wentworth (Alumnus ‘18) and is currently lead by Benjamin Glass. The main project goal is to explore the effects of real-time visual feedback on residential energy consumption (specifically electrical energy). This monitoring project builds on a successful study conducted in the Middlebury Hadley dorm complex in 2014 (Karp et al., 2015) as well as informal interviews with students regarding energy consumption in the Townhouses in the spring of 2017. The project has received Institutional Review Board (IRB) approval, is supported by Middlebury College Facilities and the Office of Sustainability Integration, and is funded by Efficiency Vermont, Middlebury Facilities, Middlebury Environmental Council, and Middlebury’s Senior Research Project Supplement.

<br>

<h2>Implementation</h2>

A 2’ LED strip has been installed in each of the twelve Middlebury College townhouse suites that each uses a single-board computer to query suite-specific electricity consumption data from a Middlebury Facilities’ database that updates every minute (Figure 1). The microcomputer grabs this numerical data and runs it through a simple functional program that compares the suite’s current kilowatt consumption with the average kilowatt consumption of the previous 7-days. The algorithm then outputs LED light on the red-green spectrum. A green glowing light represents less consumption than average while a red light represents a large increase in consumption. Each light is scheduled to run between 7am and 11pm. 

Hardware components reside within the kitchen area of each Townhouse Suite. The microcomputer is encased inside the cabinet above the Townhouse fridges (Figure 2). There is a single tamper-proof screw on each controller, and we (Thomas and Ben) have the associated screwdriver for access. The components are delicate; closest attention should be paid to the LED rod itself, as it is the hardware piece that is most exposed to human activity. See Figure 3 for hardware schematic.

We have the ability to remotely access and alter programs written on the microcomputers through VNC viewer (connects over WIFI), as well as access to each microcomputers’ command line (shell scripting capabilities). With the permission of Facilities, we can edit code and turn the computers on/off. We also have access to WebCTRL, Middlebury’s main internal monitoring system, that gives us access to Townhouse energy data (the data behind your light feedback system). Likewise, the proxy database has been recording and storing electricity data for all twelve townhouses since July 1st, 2018. We have access to this database as well. 

<br>

<h2> Query.py: What it is, and How to Use it</h2>

We are in the process of creating a website to host live-updating energy data, but in the meantime occupants and those with interest can run the program <b>Query.py</b> through the Terminal window on a Linux/Unix operating system to see numerical data from the townhouses, including Aggregate average kW consumption, individual suite current consumption and 7-day runnning average consumption. <b> If you are familiar with Shell Scripting with Python, download Query.py and run it in the terminal window. If you are unfamiliar with the above steps, directions to use Query.py are as follows: </b> <br><br>

<b>Macintosh and Windows:</b>

<b>1.</b> Install Python 3 (https://www.python.org)<br>
<b>2.</b> Download Query.py and drag it to your Desktop.<br>
<b>3.</b> Open Terminal (an application preset on your computer; icon is a black box)<br>
<b>4.</b> When the terminal opens, the first line will show
```
computer_name:~ username$
```

with a cursor in front of it. Type

```
cd Desktop
```

and press enter (Basic Terminal Commands: https://www.dummies.com/computers/macs/mac-operating-systems/how-to-use-basic-unix-commands-to-work-in-terminal-on-your-mac/).

<br>

<b> 5.</b> A new line will show
```
computer_name:Desktop username$
```

Type

```
python Query.py
```
and press enter.

  
  
You will be able to see energy data on the terminal screen. 
