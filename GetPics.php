<?php

$servername = "mysql.seemeclothing.xyz";
$username = "snackman";
$password = "1Lessday!";
$dbname = "seemedb";

$db = new mysqli($servername, $username, $password, $dbname);


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$user = $_REQUEST["u"];

//create Array to hold data
$pathArray = array();
$randomize = array();
$allDataArray = array();


$sql = "SELECT * FROM  `imageData` WHERE `userSubmitting` = '".$user."'"; 

 
 if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
    //$pictureArray[] = '<img height="100" width="100" src="data:image;base64,'.$row['image'] .'">';

    $pathArray[] = $row['imagePath'] ;
    $randomize[] = $row['displayValue'] ;
    //echo $row['imagePath'];
}


//echo '<img height="100" width="100" src="data:image;base64,'.$pictureArray[1] .'">';
//echo '<img src="data:image/jpeg;base64,'.base64_encode( $pictureArray[0] ).'"/>';
$jsonpathArray = json_encode($pathArray);
$jrandomize = json_encode($randomize);

$allDataArray[] = $jsonpathArray;
$allDataArray[] = $jrandomize;

echo json_encode($allDataArray);

$db->close();

?>