<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roastDB";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$g = $_REQUEST["g"];


$sql = "INSERT INTO GameObject (gameID) VALUES ('".$g."')";


if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$db->close();

?>