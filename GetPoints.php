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
$r=  $_REQUEST["r"]; //roundNumber

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


$VotesArray = array($A,$B,$C,$D,$E); // will the array values change when the var inside do?
$AuthorArray = array($A_Author,$B_Author,$C_Author,$D_Author,$E_Author);

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


//update points
for( $i = 0; $i = <5; $i ++){

	$AuthorArray[i];
	$VotesArray[i]; //numbers or strings?  and does it matter?

    $sql1 = "UPDATE GameObject SET P".$AuthorArray[i];."TotalPoints = P".$AuthorArray[i];."TotalPoints + '".$VotesArray[i]."' WHERE gameID = '".$g."'";
    if ($conn->query($sql1) === TRUE) {
	} else {
	    echo "Error: " . $sql1 . "<br>" . $conn->error;
	}

}



//remaining tasks
//1) compare elements of vote array to find round winner --> could also be done in js
//2) in roastoff.js also update totals and display leader


$conn->close();

?>