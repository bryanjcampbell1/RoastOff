<?php

$servername = "mysql.seemeclothing.xyz";
$username = "snackman";
$password = "1Lessday!";
$dbname = "seemedb";

$db = new mysqli($servername, $username, $password, $dbname);


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

//$successOrFailure = "TRUE";
$successOrFailure = "FALSE";


$u = $_REQUEST["u"];
$p = $_REQUEST["p"];



//create Arrays to hold data
$username_enteredValue = $u;
$password_enteredValue = $p;

$username_inDatabase;
$password__inDatabase;



$sql = "SELECT * FROM  `UserInfo` WHERE `userName` = '".$u."'"; 

 
 if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
	$password__inDatabase =  $row['password'] ;

	if ($password__inDatabase == $password_enteredValue) {
    $successOrFailure = "TRUE";
	}    

}

echo $successOrFailure;


$db->close();

?>