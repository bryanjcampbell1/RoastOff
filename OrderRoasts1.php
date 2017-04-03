<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roastDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$g=  $_REQUEST["g"]; 
$r=  $_REQUEST["r"]; 
$n=  $_REQUEST["n"];

$A;
$B;
$C;
$D;
$E;

$A_Author;
$B_Author;
$C_Author;
$D_Author;
$E_Author;

//get all from gameObject where id matches entry
$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

//determine how many pics were submitted
while($row = $result->fetch_assoc()){

	if($r ==1 ){
		$A =  $row['P1R1'] ;
		$B =  $row['P2R1'] ;
		$C =  $row['P3R1'] ;
		$D =  $row['P4R1'] ;
		$E =  $row['P5R1'] ;
	}
	if($r ==2 ){
		$A =  $row['P1R2'] ;
		$B =  $row['P2R2'] ;
		$C =  $row['P3R2'] ;
		$D =  $row['P4R2'] ;
		$E =  $row['P5R2'] ;
	}
	if($r ==3 ){
		$A =  $row['P1R3'] ;
		$B =  $row['P2R3'] ;
		$C =  $row['P3R3'] ;
		$D =  $row['P4R3'] ;
		$E =  $row['P5R3'] ;
	}


	$round1Array = array($A,$B,$C,$D,$E);

	$firstNumber ;
	$secondNumber;
	$thirdNumber;
	$fourthNumber;
	$fifthNumber;

	//if there are 3 players
	if($n == 3){

			$random = rand(0, 2);
			$firstNumber = $random;
			
			while ($firstNumber == $random) {
				$random = rand(0, 2); //reset random
				$secondNumber = $random; //use random number to set second number
			} //go back to top of loop to check if random number has already been used

			while (($firstNumber == $random) || ($secondNumber == $random)) {
				$random = rand(0, 2); 
				$thirdNumber = $random; 
			} 
				$fourthNumber = 3; 
				$fifthNumber = 4; 
	}
	else if($n == 4){
			$random = rand(0, 3);

			$firstNumber = $random;
			
			while ($firstNumber == $random) {
				$random = rand(0, 3); //reset random
				$secondNumber = $random; //use random number to set second number
			} //go back to top of loop to check if random number has already been used

			while (($firstNumber == $random) || ($secondNumber == $random)) {
				$random = rand(0, 3); 
				$thirdNumber = $random; 
			} 

			while (($firstNumber == $random) || ($secondNumber == $random) || ($thirdNumber == $random)) {
				$random = rand(0, 3); 
				$fourthNumber = $random; 
			} 
				$fifthNumber = 4; 
	}
	else{
			$random = rand(0, 4);

			$firstNumber = $random;
			
			while ($firstNumber == $random) {
				$random = rand(0, 4); //reset random
				$secondNumber = $random; //use random number to set second number
			} //go back to top of loop to check if random number has already been used

			while (($firstNumber == $random) || ($secondNumber == $random)) {
				$random = rand(0, 4); 
				$thirdNumber = $random; 
			} 

			while (($firstNumber == $random) || ($secondNumber == $random) || ($thirdNumber == $random)) {
				$random = rand(0, 4); 
				$fourthNumber = $random; 
			} 

			while (($firstNumber == $random) || ($secondNumber == $random) || ($thirdNumber == $random) || ($fourthNumber == $random) ) {
				$random = rand(0, 4); 
				$fifthNumber = $random; 
			}
	}
 

	$A = $round1Array[$firstNumber];
	$B = $round1Array[$secondNumber];
	$C = $round1Array[$thirdNumber];
    $D = $round1Array[$fourthNumber];
	$E = $round1Array[$fifthNumber];

	$A_Author = $firstNumber;
	$B_Author = $secondNumber;
	$C_Author = $thirdNumber;
	$D_Author = $fourthNumber;
	$E_Author = $fifthNumber;



}

$sql2 = "UPDATE GameObject SET B_Text = '" .$B. "',A_Text = '" .$A. "',C_Text = '" .$C. "',D_Text = '" .$D. "',E_Text = '" .$E. "',A_Creator = '" .$A_Author. "',B_Creator = '" .$B_Author. "',C_Creator = '" .$C_Author. "',D_Creator = '" .$D_Author. "',E_Creator = '" .$E_Author. "' WHERE gameID = '".$g."'";

if ($conn->query($sql2) === TRUE) {
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}


$conn->close();

?>










