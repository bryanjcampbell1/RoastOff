<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roastDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$g=  $_REQUEST["g"]; //gameID

$P1TotalPoints;
$P2TotalPoints;
$P3TotalPoints;
$P4TotalPoints;
$P5TotalPoints;

$player1;
$player2;
$player3;
$player4;
$player5; 



$PlayersArray = array($player1,$player2,$player3,$player4,$player5); // will the array values change when the var inside do?
$PointsArray = array($P1TotalPoints,$P2TotalPoints,$P3TotalPoints,$P4TotalPoints,$P5TotalPoints);
$OrderedPlayersArray = array(); 
$OrderedPointsArray array(); 
$PlayersAndPoints = array(); 

//get all from gameObject where id matches entry
$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

//determine how many pics were submitted
while($row = $result->fetch_assoc()){
	
	$player1 =  $row['player1'] ;
	$player2 =  $row['player2'] ;
	$player3 =  $row['player3'] ;
	$player4 =  $row['player4'] ;
	$player5 =  $row['player5'] ;

	$P1TotalPoints =  $row['P1TotalPoints'] ;
	$P1TotalPoints =  $row['P2TotalPoints'] ;
	$P1TotalPoints =  $row['P3TotalPoints'] ;
	$P1TotalPoints =  $row['P4TotalPoints'] ;
	$P1TotalPoints =  $row['P5TotalPoints'] ;

}

for( $i = 0; $i = <5; $i ++){

		//$string = $OrderedPlayersArray[i] . " + " . $OrderedPointsArray[i];
		//$PlayersAndPoints[] = $string;

	//if ($PointsArray[i] > 

	//}
///

}



//remaining tasks
//1) compare elements of vote array to find round winner --> could also be done in js
//2) in roastoff.js also update totals and display leader


$conn->close();

?>