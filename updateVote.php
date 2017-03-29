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
$v = $_REQUEST["v"]; // round number

$vote = $v . "_Votes";


$sql = "UPDATE GameObject SET ".$vote." = " .$vote. "+1 WHERE gameID = '".$g."'";


if ($db->query($sql) === TRUE) {

   // echo "New record created successfully";
	echo $sql; 


} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}


$db->close();

?>