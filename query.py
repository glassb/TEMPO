import MySQLdb
import datetime
mydate = datetime.datetime.now() 
month = mydate.strftime("%B")

conn = MySQLdb.connect(host='jackrabbit', user='highpeaksdw', passwd='naivecuriousarcanebionic', db='highpeaksdw')
cursor = conn.cursor()



print('\n\n\n\nCONNECTED TO DATABASE: highpeaksdw')
print("TIMESTAMP: ",mydate)
print('\n\n***************************************************************************\n\n')


#print('TEMPO Numerical Data for all 12 Townhouse suites\n\n\n\n')

# ************************************ Initilize Arrays

#(NCS (i.e. 1,2,3), Number suite, meter id, current, 7-day)
Townhouses = [[1,1,1,None,None,None],[1,2,2,None,None,None],[1,2,3,None,None,None],[1,2,4,None,None,None],[2,1,5,None,None,None], [2,2,6,None,None,None],[2,3,7,None,None,None],[2,4,8,None,None,None],[3,1,9,None,None,None],[3,2,10,None,None,None],[3,3,11,None,None,None],[3,4,12,None,None,None]]

for i in Townhouses:
	if i[0] == 1:
		i[0] = 'North'
	elif i[0] == 2:
		i[0] = 'Center'
	else:
		i[0] = 'South'

# ************************************ Current kW Consumption
for i in range(12):
	cursor.execute("SELECT data FROM highpeaksdw.kWdata where sequenceNum = (SELECT max(sequenceNum) FROM highpeaksdw.kWdata where meterid = (%s+1))",(i,))
	row = cursor.fetchone()
	Townhouses[i][3] = float(row[0])


# ************************************ 7-day Average kW Consumption
for i in range(12):
	cursor.execute("SELECT AVG(data) FROM (SELECT * FROM highpeaksdw.kWdata WHERE date >= DATE(NOW()) - INTERVAL 7 DAY HAVING meterid = (%s+1)) subquery",(i,))
	row = cursor.fetchone()
	Townhouses[i][4] = row[0]



# ************************************ This-Months Average kW Consumption (so-far)
for i in range(12):
	cursor.execute("SELECT AVG(data) FROM highpeaksdw.kWdata where meterid = (%s+1)",(i,))
	row = cursor.fetchone()
	Townhouses[i][5] = row[0]

# ************************************ Aggregate Average kW Consumption
cursor.execute("SELECT AVG(data) FROM highpeaksdw.kWdata")
row = cursor.fetchone()
print("*: %s kW" % (round(row[0],2)))
print("\n\n\n\n")


conn.close()  



print("						Current kW  		7-day Average kW 	   %s Average kW     \n" % (month))

for i in Townhouses:
	print("		[Townhouse %s %s] 		   %s  		     %s 			 %s     \n" % (i[0],i[1],i[3],round(i[4],2),round(i[5],2)))


print("\n\n\n\n")



	






#print(Townhouses )       
                

              


