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

$P1TotalPoints;
$P2TotalPoints;
$P3TotalPoints;
$P4TotalPoints;
$P5TotalPoints;


$VotesArray = array(); 
$AuthorArray = array();
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

	$VotesArray = array($A,$B,$C,$D,$E); 
	$AuthorArray = array($A_Author,$B_Author,$C_Author,$D_Author,$E_Author);

}


//update points
for( $i = 0; $i = <5; $i ++){

	$AuthorArray[i];
	$VotesArray[i]; //numbers or strings?  and does it matter?

	if ($AuthorArray[i] == 1) {//Player1 created roast

		$OrderedArray[0] = $VotesArray[i];

	} elseif ($AuthorArray[i] == 2) {

		$OrderedArray[1] = $VotesArray[i];

	} elseif ($AuthorArray[i] == 3) {

		$OrderedArray[2] = $VotesArray[i];

	} elseif ($AuthorArray[i] == 4) {

		$OrderedArray[3] = $VotesArray[i];

	} elseif ($AuthorArray[i] == 5) {

		$OrderedArray[4] = $VotesArray[i];
    
	} else {
		echo "somethings is wrong with AuthorArray";
	}

    $sql1 = "UPDATE GameObject SET P".$AuthorArray[i]."TotalPoints = P".$AuthorArray[i]."TotalPoints + '".$VotesArray[i]."' WHERE gameID = '".$g."'";
    if ($conn->query($sql1) === TRUE) {
	} else {
	    echo "Error: " . $sql1 . "<br>" . $conn->error;
	}

}


$jsonArray = json_encode($OrderedArray);

echo $jsonArray;


$conn->close();

?>