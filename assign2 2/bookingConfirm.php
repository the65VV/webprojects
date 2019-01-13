<?php

//retrieve data from post
$customerName = $_POST['customerName'];
$phone = $_POST['phone'];
$destination = $_POST['destination'];
$date = $_POST['date'];
$time = $_POST['time'];
$unitNum= $_POST['unitNum'];
$streetName = $_POST['streetName'];
$suburb = $_POST['suburb'];
$bookingstatus = 'UNASSIGNED';


sleep(1);
//Checks Connection
	require_once ('../../conf/settings.php');  
	
	//check connection
	$conn =  new mysqli($host,$user,$pswd,$dbnm);
	if($conn->connect__error)
	{
		die("Connection Failed:". $conn->connect__error);
	}
		
	else{
			echo Connected;
			echo "<br>";
		}
	

//Concats pick up address as one string
$pickupAddress = $unitNum. " ".$streetName." ".$suburb;

//checks date and time not before current date & time & validate date
date_default_timezone_set("Pacific/Auckland");
$dateToday = date('Y-m-d H:i:s');
$bookingDateTime = $date. " ".$time;


$customerName = mysqli_real_escape_string($conn, $customerName);
$phone = mysqli_real_escape_string($conn, $phone);
$destination = mysqli_real_escape_string($conn, $destination);
$pickupAddress = mysqli_real_escape_string($conn, $pickupAddress);
$bookingDateTime = mysqli_real_escape_string($conn, $bookingDateTime);


if($bookingDateTime >=  $dateToday)
{

//insert booking
$sql = "INSERT INTO CabsOnline(CustomerName,ContactNumber,Destination, BookingDateTime ,PickUp, BookingStatus) 
VALUES('$customerName', '$phone', '$destination', '$bookingDateTime', '$pickupAddress', '$bookingstatus');";

	echo "<br>";

	if(mysqli_query($conn, $sql)){
		echo "Records inserted successfully.";
		echo "<br>";

	} else{
	   echo "ERROR:  " . mysqli_error($conn);
	}

}

else{

	echo "Incorrect values, Book again";
}


 // This displays user their booking number and their pick up date time.

 $query = "SELECT BookingNumber,CustomerName, ContactNumber FROM CabsOnline
 WHERE `CustomerName`LIKE '$customerName' AND `ContactNumber`LIKE '$phone'";

$queryResult = mysqli_query($conn, $query);
if(mysqli_num_rows($queryResult) != 0)		
{

 $row = mysqli_fetch_row($queryResult);
 echo "Your booking number is  " .$row[0].  "  and you will be picked up at  " .$bookingDateTime;

}
			
$conn->close();	
	
?>