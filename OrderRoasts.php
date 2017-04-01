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


$r=  $_REQUEST["r"]; //roundNumber

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
	
	$P3R1 =  $row['P1R1'] ;
	$P3R1 =  $row['P2R1'] ;
	$P3R1 =  $row['P3R1'] ;
	$P4R1 =  $row['P4R1'] ;
	$P5R1 =  $row['P5R1'] ;
	

	$A =  $row['P1R1'] ;
	$B =  $row['P2R1'] ;
	$C =  $row['P3R1'] ;
	$D =  $row['P4R1'] ;
	$E =  $row['P5R1'] ;

	/*
	$P1R2 =  $row['P1R2'] ;
	$P2R2 =  $row['P2R2'] ;
	$P3R2 =  $row['P3R2'] ;
	$P4R2 =  $row['P4R2'] ;
	$P5R2 =  $row['P5R2'] ;

	$P1R3 =  $row['P1R3'] ;
	$P2R3 =  $row['P2R3'] ;
	$P3R3 =  $row['P3R3'] ;
	$P4R3 =  $row['P4R3'] ;
	$P5R3 =  $row['P5R3'] ;
/*
	$round1Array = array($P1R1,$P2R1,$P3R1,$P4R1,$P5R1);
	//$round2Array = array($P1R2,$P2R2,$P3R2,$P4R2,$P5R2);
	//$round3Array = array($P1R3,$P2R3,$P3R3,$P4R3,$P5R3);


 //add constraint to not allow numbers larger than number of players --> only matters for 4th and 5th 

	$firstNumber = 1;
	$secondNumber = 4;
	$thirdNumber = 3;
	$fourthNumber = 0;
	$fifthNumber = 2;

/*
	$firstNumber = rand(0, 4);
		
	do { $secondNumber = rand(0, 4);
		}
	while ($firstNumber == $secondNumber); //repeat while first and 2nd number match

	do { $thirdNumber = rand(0, 4);
		}
	while (($firstNumber == $thirdNumber) || ($secondNumber == $thirdNumber) );	

	do { $fourthNumber = rand(0, 4);
		}
	while (($firstNumber == $fourthNumber) || ($secondNumber == $fourthNumber) || ($thirdNumber == $fourthNumber)|| ($players < $fourthNumber));	

	do { $fifthNumber = rand(0, 4);
		}
	while (($firstNumber == $fifthNumber) || ($secondNumber == $fifthNumber) || ($thirdNumber == $fifthNumber)|| ($fourthNumber == $fifthNumber)|| ($players < $fifthNumber));	

		$A = $round1Array[$firstNumber];
	    $B = $round1Array[$secondNumber];
	    $C = $round1Array[$thirdNumber];
	    $D = $round1Array[$fourthNumber];
	    $E = $round1Array[$fifthNumber];




/*


    if($r == 1){
    	$A = $round1Array[$firstNumber];
	    $B = $round1Array[$secondNumber];
	    $C = $round1Array[$thirdNumber];
	    $D = $round1Array[$fourthNumber];
	    $E = $round1Array[$fifthNumber];
    }
    if($r == 2){
    	$A = $round2Array[$firstNumber];
	    $B = $round2Array[$secondNumber];
	    $C = $round2Array[$thirdNumber];
	    $D = $round2Array[$fourthNumber];
	    $E = $round2Array[$fifthNumber];
    }
    if($r == 3){
    	$A = $round3Array[$firstNumber];
	    $B = $round3Array[$secondNumber];
	    $C = $round3Array[$thirdNumber];
	    $D = $round3Array[$fourthNumber];
	    $E = $round3Array[$fifthNumber];
    }

    // + 1 in order to have users run fro 1 to 5
    $A_Author = $firstNumber + 1;
	$B_Author = $secondNumber + 1;
	$C_Author = $thirdNumber + 1;
	$D_Author = $fourthNumber + 1;
	$E_Author = $fifthNumber + 1;
*/
}

//$sql1 = "INSERT INTO GameObject (gameID,A_Text,B_Text,C_Text,D_Text,E_Text,A_Creator,B_Creator,C_Creator,D_Creator,E_Creator) VALUES (1,1,1),(2,2,3),(3,9,3),(4,10,12)
//ON DUPLICATE KEY UPDATE Col1=VALUES(Col1);"

//8 seperate sql requests
//$sql1 = "UPDATE GameObject SET A_Text = '" .$A. "',B_Text = '" .$B. "',C_Text = '" .$C. "',D_Text = '" .$D. "',E_Text = '" .$E. "', WHERE gameID = '".$g."'";

/*
$sql2 = "UPDATE GameObject SET B_Text = '" .$B. "' WHERE gameID = '".$g."'";
$sql3 = "UPDATE GameObject SET C_Text = '" .$C. "' WHERE gameID = '".$g."'";
$sql4 = "UPDATE GameObject SET D_Text = '" .$D. "' WHERE gameID = '".$g."'";
$sql5 = "UPDATE GameObject SET E_Text = '" .$E. "' WHERE gameID = '".$g."'";
$sql6 = "UPDATE GameObject SET A_Creator = '" .$A_Author. "' WHERE gameID = '".$g."'";
$sql7 = "UPDATE GameObject SET B_Creator = '" .$B_Author. "' WHERE gameID = '".$g."'";
$sql8 = "UPDATE GameObject SET C_Creator = '" .$C_Author. "' WHERE gameID = '".$g."'";
$sql9 = "UPDATE GameObject SET D_Creator = '" .$D_Author. "' WHERE gameID = '".$g."'";
$sql10 = "UPDATE GameObject SET E_Creator = '" .$E_Author. "' WHERE gameID = '".$g."'";
*/


//sql2 does exactly what it is supposed to --> need to change how $A is assigned in while loop above
$sql2 = "UPDATE GameObject SET B_Text = '" .$B. "',A_Text = '" .$A. "',C_Text = '" .$C. "',D_Text = '" .$D. "',E_Text = '" .$E. "' WHERE gameID = '".$g."'";

if ($conn->query($sql2) === TRUE) {
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}


$conn->close();

?>