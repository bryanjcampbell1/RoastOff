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

$A;
$A;
$C;
$D;
$E;



$Array = array(0,0,0,0,0);

//get all from gameObject where id matches entry
$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

//determine how many pics were submitted
while($row = $result->fetch_assoc()){
	
	$A =  $row['P1TotalPoints'] ;
	$B =  $row['P2TotalPoints'] ;
	$C =  $row['P3TotalPoints'] ;
	$D =  $row['P4TotalPoints'] ;
	$E =  $row['P5TotalPoints'] ;

	$Array = array(0,0,0,0,0);
}


//1) get votes for A,B,C,D,E
//2) apply those votes to the authors 
//-----------------------------------//
//to apply votes to authors
$Array[0] = $A ; //associates votes of Roast A with slot corresponding to author number
$Array[1] = $B ; 
$Array[2] = $C ;
$Array[3] = $D ;
$Array[4] = $E ;




$jsonArray = json_encode($Array);

echo $jsonArray;


$conn->close();

?>