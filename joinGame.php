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

$u=  $_REQUEST["u"];
$g=  $_REQUEST["g"];

$player1;
$player2;
$player3;
$player4;
$player5;

$playerNumber;

//get all from gameObject where id matches entry
$sql1 = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql1)){
    die('There was an error running the query [' . $conn->error . ']');
}


while($row = $result->fetch_assoc()){
	$player1 =  $row['player1'] ;
	$player2 =  $row['player2'] ;
	$player3 =  $row['player3'] ;
	$player4 =  $row['player4'] ;
	$player5 =  $row['player5'] ;

	//determine first open slot
	if (strlen($player1) == 0) {
		$playerNumber = "1";
	} 
	elseif (strlen($player2) == 0) {
		$playerNumber = "2";
	} 
	elseif (strlen($player3) == 0) {
		$playerNumber = "3";
	}
	elseif (strlen($player4) == 0) {
		$playerNumber = "4";
	}	
	elseif (strlen($player5) == 0) {
		$playerNumber = "5";
	}		
	else {
		//print error
	}    

} //close while

$playerString = "player" . $playerNumber;


//$sql = "UPDATE GameObject SET player1 = '".$u."' WHERE gameID = '".$g."'";
$sql = "UPDATE GameObject SET ".$playerString." = '".$u."' WHERE gameID = '".$g."'";


if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    echo intval($playerNumber);

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}







$conn->close();

?>