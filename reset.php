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

$g=  $_REQUEST["g"]; 

$sql = "UPDATE GameObject SET B_Votes = 0,A_Votes= 0,C_Votes = 0,D_Votes = 0,E_Votes = 0 WHERE gameID = '".$g."'";

//$sql = "UPDATE GameObject SET B_Text = "",A_Text = "",C_Text = "",D_Text = "",E_Text = "",A_Creator = "",B_Creator = "",C_Creator = "",D_Creator = "",E_Creator = "",A_Votes = 0,B_Votes = 0,C_Votes = 0,D_Votes = 0,E_Votes = 0 WHERE gameID = '".$g."'";


//$sql = "UPDATE GameObject SET A_Votes = 0 WHERE gameID = '".$g."'";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>
