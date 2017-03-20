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

$picNumber;
$gamePic1;
$gamePic2;
$gamePic3;

$player1;
$player2;
$player3;
$player4;
$player5;
$player6;
$player7;
$player8;
$player9;
$player10;





//get all from gameObject where id matches entry
$sql = "SELECT * FROM  `GameObject` WHERE `gameID` = '".$g."'"; 

 
 if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

//determine how many pics were submitted
while($row = $result->fetch_assoc()){
	
	$player1 =  $row['picturePath1'] ;
	$player2 =  $row['picturePath2'] ;
	$player3 =  $row['picturePath3'] ;
	$player4 =  $row['picturePath4'] ;
	$player5 =  $row['picturePath5'] ;
	$player6 =  $row['picturePath6'] ;
	$player7 =  $row['picturePath7'] ;
	$player8 =  $row['picturePath8'] ;
	$player9 =  $row['picturePath9'] ;
	$player10 = $row['picturePath10'] ;

	$pathArray = array($player1, $player2, $player3, $player4, $player5, $player6, $player7, $player8, $player9, $player10);

	//determine first open slot
	if (strlen($player1) == 0) {
		$picNumber = 0;
	} 
	elseif (strlen($player2) == 0) {
		$picNumber = 1;
	} 
	elseif (strlen($player3) == 0) {
		$picNumber = 2;
	}
	elseif (strlen($player4) == 0) {
		$picNumber = 3;
	}	
	elseif (strlen($player5) == 0) {
		$picNumber = 4;
	}		
	elseif (strlen($player6) == 0) {
		$picNumber = 5;
	} 
	elseif (strlen($player7) == 0) {
		$picNumber = 6;
	}
	elseif (strlen($player8) == 0) {
		$picNumber = 7;
	}	
	elseif (strlen($player9) == 0) {
		$picNumber = 8;
	}	
	elseif (strlen($player10) == 0) {
		$picNumber = 9;
	}
	else {
		$picNumber = 10;
	}    

	
	if($picNumber < 3 ) // first add pics from stock file ---> to picturePath
	{

		do {
			if ($picNumber == 0){
				$path = "goofyPeople/" . (string)rand(1, 36) . ".jpg";
				//check to see if $path can be used to set gamePic1 below
				$pathArray[0] = $path;




				$sql_a = "UPDATE GameObject SET picturePath1 = '".$path."' WHERE gameID = '".$g."'";
				
				if ($conn->query($sql_a) === TRUE) {
			    	echo "New record created successfully";
				} else {
				    echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
			}
			elseif ($picNumber == 1) {
				$path = "goofyPeople/" . (string)rand(1, 36) . ".jpg";

				$pathArray[1] = $path;

				$sql_a = "UPDATE GameObject SET picturePath2 = '".$path."' WHERE gameID = '".$g."'";
				
				if ($conn->query($sql_a) === TRUE) {
			    	echo "New record created successfully";
				} else {
				    echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
			}
			elseif ($picNumber == 2) {
				$path = "goofyPeople/" . (string)rand(1, 36) . ".jpg";

				$pathArray[2] = $path;

				$sql_a = "UPDATE GameObject SET picturePath3 = '".$path."' WHERE gameID = '".$g."'";
				
				if ($conn->query($sql_a) === TRUE) {
			    	echo "New record created successfully";
				} else {
				    echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
			}
			else {
			}

	   		$picNumber = $picNumber +1;

		}
		while ($picNumber < 3);
	}


		

		$firstNumber;
		$secondNumber;
		$thirdNumber;


		//set first number
		$firstNumber = rand(0, ($picNumber - 1));
		
		//set second number
		do {
	   		$secondNumber = rand(0, ($picNumber - 1));
		}
		while ($firstNumber == $secondNumber); //repeat while first and 2nd number match

		//set third number
		do {
	   		$thirdNumber = rand(0, ($picNumber - 1));
		}
		while (($firstNumber == $thirdNumber) || ($secondNumber == $thirdNumber) ); //repeat while first and 2nd number match


$gamePic1 = $pathArray[$firstNumber];
$gamePic2 = $pathArray[$secondNumber];
$gamePic3 = $pathArray[$thirdNumber];


} //close while




//$gamePic2 = 'yoyo';

//$sql = "UPDATE GameObject SET gamePic2 = 'jjjrrrr' WHERE gameID = '".$g."'"; //works --> Note: doesnt if 'jjjrrr' has no ''
$sql1 = "UPDATE GameObject SET gamePic1 = '".$gamePic1."' WHERE gameID = '".$g."'";


if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$sql2 = "UPDATE GameObject SET gamePic2 = '".$gamePic2."' WHERE gameID = '".$g."'";


if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$sql3 = "UPDATE GameObject SET gamePic3 = '".$gamePic3."' WHERE gameID = '".$g."'";


if ($conn->query($sql3) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}

$conn->close();

?>