<?php

$servername = "mysql.seemeclothing.xyz";
$username = "snackman";
$password = "1Lessday!";
$dbname = "seemedb";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully". "<br>";

$userName =  $_REQUEST["userame"];
$path= $_REQUEST["path"];

$display = 1;
$dontDisplay = 0;

$sql = "Update imageData SET displayValue = '".$dontDisplay."' WHERE userSubmitting ='".$userName."'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
/*
$sql2 = "Update imageData SET displayValue = '".$display."' WHERE imagePath ='".$path."'";
if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}
*/

$conn->close();

?>