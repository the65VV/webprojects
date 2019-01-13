
<!DOCTYPE html>

<html>
<head>
<title> Task 3- Process Status Data</title>
<link rel = "stylesheet" href = "style.css">
<meta http-equiv="Content-Type" content = "text/html; charset=utf-8"/>

</head>

<body>
<h1> Status Process Information</h1>

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
		
		
		//Creates table status Page
		
		$sql = "CREATE Table statusPage(
		status_code VARCHAR(5) NOT NULL ,
		status VARCHAR(50) NOT NULL,
		share VARCHAR(10),
		date VARCHAR(10),
		permission VARCHAR(50)
			
		)";
		
		if($conn->query($sql)==TRUE){
			
			echo "Table created";
		}
		else{
				echo "error creating Table" . $conn->error;
				echo "<br>";
		}
		
		
		//Uses Post to retrieve users entered data
		$status_code = $_POST["status_code"];
		$status = $_POST["status"];
		$share = $_POST["radio"];
		$date = $_POST["date"];
		
		
		//Checks for multiple check boxes
		$permission1;
		$permission2;
		$permission3;
		
		
		if(!empty($_POST["permissionType"]));
		
		
		foreach($_POST['permissionType'] as $value)
		{
			if($permission1 == null)
			{
				$permission1 = $value;
				
			}
			else
			{
				if($permission2 == null)
				{
				$permission2 = $value;
				}
				
				else{
					
					$permission3 = $value;
				}
			}
			
			
		}
		
		$permissionMultiple = $permission1.$permission2.$permission3;
	

		
		//searches for existing status codes
		$sql = "SELECT * FROM statusPage where 'status_code' LIKE '%scResult%'";	
		$scResult = mysqli_query($conn, $sql);
	
		if(mysqli_num_rows($scResult) > 0){
			
			while($row = mysqli_fetch_assoc($scResult)){
				
			}
			
		}
	
		else{

		//inserts new status to database
		$query = "insert into statusPage(status_code,status,share,date,permission)
		VALUES('$status_code','$status','$share','$date','$permissionMultiple');";
	
		//echo $query;
		//executes query
		$result = mysqli_query($conn, $query);
		if(!$result){
			
			echo "Your status couldn't be posted as Status code already exists in database";
			echo "<br>";
			echo '<a href = "http://pgn2065.cmslamp14.aut.ac.nz/assign1/poststatusform.php"> Click here to post again</a>';
			
			
		}else{
			
			echo "Confirmation: Your status was posted";
			echo "<br>";
			echo '<a href = "http://pgn2065.cmslamp14.aut.ac.nz/assign1/index.html"> Click here to return to Home Page</a>';
		}
		
		}
		
		$conn->close();
		

?>


<p> <a href = "index.html"> Return to home Page</a></p>
<p> <a href = "poststatusform.php"> Return to Post Status Page</a></p>

</body>
</html>
