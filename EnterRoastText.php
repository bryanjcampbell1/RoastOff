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
$f = $_REQUEST["f"]; // round number
$p = $_REQUEST["p"]; // player number

//$round = strval($r); 

$roast = $_REQUEST["e"]; // roast text


$playerAndRound = "P".$p."R".$f;

$sql = "UPDATE GameObject SET ".$playerAndRound." = '" .$roast. "' WHERE gameID = '".$g."'";


if ($db->query($sql) === TRUE) {

    echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $db->error;
	echo $f ;
}


$db->close();

?>