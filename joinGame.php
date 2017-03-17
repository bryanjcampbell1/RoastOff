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



//where gameID == $g
//if player1 == nil -->insrt into player1 
//els if ... or switch

//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
$sql = "UPDATE GameObject SET player1 = '".$u."' WHERE gameID = '".$g."'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>