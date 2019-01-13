<?php

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

    $bookingNum = $_POST['bookingNumber'];



$sql = "SELECT * FROM CabsOnline WHERE BookingNumber LIKE $bookingNum 
 AND BookingStatus LIKE 'UNASSIGNED'";
 
 

$showAllbookings = mysqli_query($conn, $sql);

if(mysqli_num_rows($showAllbookings)!=1){

    echo "Your booking Number was not found";

} 
else{

 $updateQuery =  "UPDATE CabsOnline SET BookingStatus = 'ASSIGNED' WHERE BookingNumber LIKE '$bookingNum'";


$showAllbookings = mysqli_query($conn, $updateQuery);


echo "Your booking was assigned";

}

?>