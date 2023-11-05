<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Manage About us Page - Online Babysitters</title>
</head>
<body align="center">
<h1>Manage About us Page - Online Babysitters</h1><br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
	
	if(isset($_POST['DESCR']))
	{
		$desc=$_POST['DESCR'];
		$query = "UPDATE Data SET Description='$desc'";
		if($conn->query($query))
		{
			echo "Descripion record updated succesfully<br>";
		}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
	}
	if(isset($_POST['CN']))
	{
		$cn=$_POST['CN'];
		$query = "UPDATE Data SET ContactNumber='$cn'";
		if($conn->query($query))
		{
			echo "Contact number record updated succesfully<br>";
		}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
	}
	if(isset($_POST['ICN']))
	{
		$icn=$_POST['ICN'];
		$query= "UPDATE Data SET InternationalContactNumber='$icn'";
		if($conn->query($query))
		{
			echo "International contact number record updated succesfully<br>";
		}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
	}
	if(isset($_POST['EMAIL']))
	{
		$email=$_POST['EMAIL'];
		$query = "UPDATE Data SET Email='$email'";
		if($conn->query($query))
		{
			echo "Email record updated succesfully<br>";
		}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
	}
	
		
				?>
   </body>
</html>