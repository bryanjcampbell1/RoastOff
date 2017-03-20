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

//create Array to hold data
$pathArray = array();


$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

while($row = $result->fetch_assoc()){
    //$pictureArray[] = '<img height="100" width="100" src="data:image;base64,'.$row['image'] .'">';
    $pathArray = array($row['gamePic1'], $row['gamePic2'], $row['gamePic3']);
}

$jsonpathArray = json_encode($pathArray);

echo $jsonpathArray;

$db->close();

?>