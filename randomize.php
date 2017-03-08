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

$username = $_REQUEST["username"];
$checkboxValue = $_REQUEST["checkboxValue"];

$sql = "Update imageData SET displayValue = '".$checkboxValue."' WHERE userSubmitting ='".$username."'";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>