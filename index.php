<?php
//Step1
 $db = mysqli_connect('jackrabbit','highpeaksdw','naivecuriousarcanebionic','highpeaksdw')
 or die('Error connecting to MySQL server.');
?>



<html>
 <head>
 </head>
 <body>
 <h1>Townhouse Energy Data</h1>

 <p> <b>Developers:</b> Thomas Wentworth '18 and Benjamin Glass '20.5 <br></p>
 <!-- <p> <b>Oversight:</b> Jack Byrne (Office of Sustainability Integration) <br><br></p> -->


<p> <b>Overview:</b> Townhouse LED colors' update every 60 seconds based on respective townhouse electricity usage. Current power (kW) usage is compared to average power from the previous 7 days (kW), and then converted to the red-green light spectrum. Green light means current energy is less than the 7-day average, and contrary, red denotes greater usage. Greater color intensity (e.g. a vibrant green) correlates to energy use extremity (e.g. very low energy use). A yellow tint denotes a similar current use to the baseline average for your suite. <br></p>

 <p> <b>Link to feedback form: </b><br><br></p>




 <?php
 echo "<b>Current kW consumption:</b> <br><br>";

###------------------------------------------ NORTH 1 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 1)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 1:</b> ",$row[0],"<br>";

###------------------------------------------ North 2 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 2)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 2:</b> ",$row[0],"<br>";

###------------------------------------------ NORTH 3 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 3)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 3:</b> ",$row[0],"<br>";

###------------------------------------------ NORTH 4 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 4)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 4:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 1 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 5)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 1:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 2 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 6)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 2:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 3 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 7)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 3:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 4 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 8)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 4:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 1 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 9)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 1:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 2 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 10)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 2:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 3 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 11)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 3:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 4 -----------------------------------------------

$query = 	"SELECT data FROM highpeaksdw.kWdata
                    where sequenceNum =
                    (SELECT max(sequenceNum)
                    FROM highpeaksdw.kWdata
                    where meterid = 12)";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 4:</b> ",$row[0],"<br>";





echo "<br><br>";








 echo "<b>7-day running averages of kW consumption:</b> <br><br>";

###------------------------------------------ NORTH 1 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 1) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 1:</b> ",$row[0],"<br>";

###------------------------------------------ North 2 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 2) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 2:</b> ",$row[0],"<br>";

###------------------------------------------ NORTH 3 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 3) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 3:</b> ",$row[0],"<br>";

###------------------------------------------ NORTH 4 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 4) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>North 4:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 1 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 5) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 1:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 2 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 6) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 2:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 3 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 7) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 3:</b> ",$row[0],"<br>";

###------------------------------------------ CENTER 4 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 8) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>Center 4:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 1 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 9) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 1:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 2 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 10) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 2:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 3 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 11) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 3:</b> ",$row[0],"<br>";

###------------------------------------------ SOUTH 4 -----------------------------------------------

$query = 	"SELECT AVG(data) 
			FROM 
				(SELECT *
				FROM highpeaksdw.kWdata
				WHERE date >= DATE(NOW()) - INTERVAL 7 DAY 
				HAVING meterid = 12) subquery";


mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);


echo "<b>South 4:</b> ",$row[0],"<br>";

mysqli_close($db);

?>


</body>
</html>



