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

$A_Author;
$B_Author;
$C_Author;
$D_Author;
$E_Author;

$OrderedArray = array(0,0,0,0,0);

//get all from gameObject where id matches entry
$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

//determine how many pics were submitted
while($row = $result->fetch_assoc()){
	
	$A =  $row['A_Votes'] ;
	$B =  $row['B_Votes'] ;
	$C =  $row['C_Votes'] ;
	$D =  $row['D_Votes'] ;
	$E =  $row['E_Votes'] ;

//currently A_Creator is a string like "3" --> if problem double check if this is true
	$A_Author = $row['A_Creator'];
	$B_Author = $row['B_Creator'];
	$C_Author = $row['C_Creator'];
	$D_Author = $row['D_Creator'];
	$E_Author = $row['E_Creator'];
}


//1) get votes for A,B,C,D,E
//2) apply those votes to the authors 
//-----------------------------------//
//to apply votes to authors
$OrderedArray[$A_Author] = $A ; //associates votes of Roast A with slot corresponding to author number
$OrderedArray[$B_Author] = $B ; 
$OrderedArray[$C_Author] = $C ;
$OrderedArray[$D_Author] = $D ;
$OrderedArray[$E_Author] = $E ;

$sql1 = "UPDATE GameObject SET P1TotalPoints = P1TotalPoints + '".$OrderedArray[0]."',P2TotalPoints = P2TotalPoints + '".$OrderedArray[1]."',P3TotalPoints = P3TotalPoints + '".$OrderedArray[2]."',P4TotalPoints = P4TotalPoints + '".$OrderedArray[3]."',P5TotalPoints = P5TotalPoints + '".$OrderedArray[4]."' WHERE gameID = '".$g."'";
if ($conn->query($sql1) === TRUE) {
} else {
 echo "Error: " . $sql1 . "<br>" . $conn->error;
}



$jsonArray = json_encode($OrderedArray);

echo $jsonArray;


$conn->close();

?>