<?php

$servername = "mysql.seemeclothing.xyz";
$username = "snackman";
$password = "1Lessday!";
$dbname = "seemedb";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

//$u = $_REQUEST["u"];
//$p = $_REQUEST["p"];

$u = "colin";
$p = "colin";


$sql = "INSERT INTO UserInfo (userName, password) VALUES ('".$u."', '".$p."')";


if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$db->close();

?>