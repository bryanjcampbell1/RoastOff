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

$file = $_FILES['file-0'];
$name = $file['name'];


//rename with random string
$length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
$name = $randomString;

$path = "keepPicsHere/" . basename($name);  //path used to locate pictures to be displayed


if (move_uploaded_file($file['tmp_name'], $path)) {

} else {
    //echo "Move failed. Possible duplicate?";
}


//$u=  $_REQUEST["u"];
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
	/*
	$player1 =  $row['player1'] ;
	$player2 =  $row['player2'] ;
	$player3 =  $row['player3'] ;
	$player4 =  $row['player4'] ;
	$player5 =  $row['player5'] ;
*/
	$player1 =  $row['picturePath1'] ;
	$player2 =  $row['picturePath2'] ;
	$player3 =  $row['picturePath3'] ;
	$player4 =  $row['picturePath4'] ;
	$player5 =  $row['picturePath5'] ;
	$player6 =  $row['picturePath6'] ;
	$player7 =  $row['picturePath7'] ;
	$player8 =  $row['picturePath8'] ;
	$player9 =  $row['picturePath9'] ;
	$player10 =  $row['picturePath10'] ;

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
	elseif (strlen($player6) == 0) {
		$playerNumber = "6";
	} 
	elseif (strlen($player7) == 0) {
		$playerNumber = "7";
	}
	elseif (strlen($player8) == 0) {
		$playerNumber = "8";
	}	
	elseif (strlen($player9) == 0) {
		$playerNumber = "9";
	}	
	elseif (strlen($player10) == 0) {
		$playerNumber = "10";
	}
	else {
		//print error
	}    

} //close while

//$playerString = "player" . $playerNumber;
$playerString = "picturePath" . $playerNumber;

//$sql = "UPDATE GameObject SET ".$playerString." = '88888ggh' WHERE gameID = '".$g."'";
$sql = "UPDATE GameObject SET ".$playerString." = '" .$path. "' WHERE gameID = '".$g."'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}







$conn->close();

?>