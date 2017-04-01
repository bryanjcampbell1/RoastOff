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

$RoastsArray = array(); 

//get all from gameObject where id matches entry
$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

//determine how many pics were submitted
while($row = $result->fetch_assoc()){
	
	$A =  $row['A_Text'] ;
	$B =  $row['B_Text'] ;
	$C =  $row['C_Text'] ;
	$D =  $row['D_Text'] ;
	$E =  $row['E_Text'] ;

	$RoastsArray = array($A,$B,$C,$D,$E);
	//$RoastsArray = array("yo","yo","yo","yo","yo");
}

$jsonArray = json_encode($RoastsArray);

echo $jsonArray;


$conn->close();

?>