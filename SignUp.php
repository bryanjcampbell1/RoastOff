<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roastDB";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$u = $_REQUEST["u"];
$p = $_REQUEST["p"];
$e = $_REQUEST["e"];


$sql = "INSERT INTO UserInfo (userName, password, email) VALUES ('".$u."', '".$p."', '".$e."')";


if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$db->close();

?>