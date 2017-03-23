<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roastDB";

$db = new mysqli($servername, $username, $password, $dbname);


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$g = $_REQUEST["g"]; // join code
$r = $_REQUEST["r"]; // round number
$p = $_REQUEST["p"]; // player number

$roast = $_REQUEST["e"]; // roast text


$playerAndRound = "P".$p."R".$r;

$sql = "UPDATE GameObject SET ".$playerAndRound." = '" .$roast. "' WHERE gameID = '".$g."'";


if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();

?>