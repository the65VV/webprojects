<?php

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

	
//Display Bookings in the next 2hours
$sql = "SELECT * FROM CabsOnline WHERE BookingStatus LIKE '%UNASSIGNED%'
AND (BookingDateTime BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 2 HOUR))";


$showAllbookings = $conn->query($sql);


		echo "<table border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">BookingNumber</th>\n"
			     ."<th scope=\"col\">CustomerName</th>\n"
				 ."<th scope=\"col\">ContactNumber</th>\n"
				 ."<th scope=\"col\">Destination</th>\n"
				 ."<th scope=\"col\">BookingDateTime</th>\n"
				  ."<th scope=\"col\">PickUp</th>\n"
				 ."<th scope=\"col\">BookingStatus</th>\n"
				 ."</tr>\n";
	
	
	while($row = $showAllbookings->fetch_assoc())
	{
		
		echo "<tr><td>{$row['BookingNumber']}</td>";
		echo "<td>{$row["CustomerName"]}</td>";
		echo "<td>{$row["ContactNumber"]}</td>";
		echo "<td>{$row["Destination"]}</td>";
		echo "<td>{$row["BookingDateTime"]}</td>";
		echo "<td>{$row["PickUp"]}</td>";
		echo "<td>{$row["BookingStatus"]}</td></tr>";
		
}


echo "</table>";


$conn->close();
?>
