


<?php
//Needs to be triggered with "http://seemeclothing.xyz/TeeShirt.php?userame=bryan"
$servername = "mysql.seemeclothing.xyz";
$username = "snackman";
$password = "1Lessday!";
$dbname = "seemedb";

$db = new mysqli($servername, $username, $password, $dbname);


if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$user = $_GET['user'];

//static user for now
//$user = "bryan";

//create Array to hold data
$picsToShowArray = array();

//or could filter displayValue here im the sql query
$sql = "SELECT * FROM  `imageData` WHERE `userSubmitting` = '".$user."'"; 

 
 if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}


while($row = $result->fetch_assoc()){
    //populate array with pictures to print to shirt
    if ($row['displayValue']=1) {
    	$picsToShowArray[] = $row['imagePath'] ;
		} 
}

//choose one of the pictures at random
$length = sizeof($picsToShowArray);
$chosenIndex = rand(0,$length-1);
$pic = $picsToShowArray[$chosenIndex];

echo "<img src='".$pic."' style='width:350px'; alt='icon' />";


$db->close();

?>