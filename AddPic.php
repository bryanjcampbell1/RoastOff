<?php

$servername = "mysql.seemeclothing.xyz";
$username = "snackman";
$password = "1Lessday!";
$dbname = "seemedb";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$file = $_FILES['file-0'];
$name = $file['name'];

//rename with random string
$length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
$name = $randomString;

$user = $_REQUEST["u"]; 

$path = "keepPicsHere/" . basename($name);
if (move_uploaded_file($file['tmp_name'], $path)) {

} else {
    //echo "Move failed. Possible duplicate?";
}


$sql = "INSERT INTO imageData (userSubmitting, imagePath) VALUES ('".$user."', '" . $path . "')";

if ($db->query($sql) === TRUE) {
    //echo "New record created successfully";
    

} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$db->close();


?>