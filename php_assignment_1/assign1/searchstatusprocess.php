<!DOCTYPE html>

<html>
<head>
<title> Task 5 - Process Status Search data </title>
<meta http-equiv="Content-Type" content = "text/html; charset=utf-8"/>
<link rel = "stylesheet" href = "style.css">
<p> <a href = "index.html"> Return to home Page</a></p>

</head>

<body>
<h1> Status Information</h1>

<?php

	//checks connection to database
	require_once ('../../conf/settings.php');  
	$conn =  new mysqli($host,$user,$pswd,$dbnm);
	if($conn->connect__error)
	{
		die("Connection Failed:". $conn->connect__error);
	}
		
	else{
			echo Connected;
			echo "<br>";
		}

	//gets value from search status form
	$Vstatus = $_GET['Vstatus']; 
	
	//query database 
	$sql = "SELECT * FROM statusPage WHERE status LIKE '%{$Vstatus}%'";
	
	$Vresult = mysqli_query($conn, $sql);
	
	//status not found
	if(mysqli_num_rows($Vresult) == 0){
		
		echo "Status searched not found in database";
		echo "<br>";
		echo '<a href = "http://pgn2065.cmslamp14.aut.ac.nz/assign1/searchstatusform.html"> Click here to Search Again</a>';
		echo "<br>";
		echo '<a href = "http://pgn2065.cmslamp14.aut.ac.nz/assign1/index.html"> Click here to Return to Home page</a>';
	}
	//if status found
	else{
		
			echo "<table border=\"1\">";
			echo "<tr>\n"
				 ."<th scope=\"col\">Status Code</th>\n"
			     ."<th scope=\"col\">Status</th>\n"
				 ."<th scope=\"col\">Share</th>\n"
				 ."<th scope=\"col\">Date</th>\n"
				 ."<th scope=\"col\">Permission</th>\n"
				 ."</tr>\n";	
	
	
	while($row = mysqli_fetch_assoc($Vresult)){
		
		echo "<tr><td>{$row["status_code"]}</td>";
		echo "<td>{$row["status"]}</td>";
		echo "<td>{$row["share"]}</td>";
		echo "<td>{$row["date"]}</td>";
		echo "<td>{$row["permission"]}</td></tr>";
		

	
	}
	
	
	echo "</table>";
	
	echo '<a href = "http://pgn2065.cmslamp14.aut.ac.nz/assign1/searchstatusform.html"> Click here to Search Again</a>';
	echo "<br>";
	echo '<a href = "http://pgn2065.cmslamp14.aut.ac.nz/assign1/index.html"> Click here to Return to Home page</a>';
	mysqli_free_result($Vresult);
	}

$conn->close();

?>

</body>
</html>