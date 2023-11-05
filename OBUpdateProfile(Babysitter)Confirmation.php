<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Manage Babysitters Confirmation - Online Babysitters</title>
</head>
<body align="center">
<h1>Manage Babysitters Confirmation- Online Babysitters</h1><br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
	$NumberOfBabysitters=0;
	
	$truid=$_SESSION['ID'];
	if(isset($_POST['EMAIL']))
	{
		$email=$_POST['EMAIL'];		
		$query = "UPDATE Babysitters SET Email='$email' WHERE Id='$truid'";
		if($conn->query($query))
		{	
		echo "<h3>Email Record updated succesfuly</h3><br>";
		}
		else
		{
			echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
		}
	}
	if(isset($_POST['NAME']))
	{
		$name=$_POST['NAME'];
		$query = "UPDATE Babysitters SET Name='$name' WHERE Id='$truid'";
		if($conn->query($query))
		{
			echo "<h3>Name Record updated succesfuly</h3><br>";	
		}
		else
		{
			echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";				}
		}	
	if(isset($_POST['PHNO']))
	{
		$phno=$_POST['PHNO'];
		$query = "UPDATE Babysitters SET PhoneNo='$phno' WHERE Id='$truid'";
		if($conn->query($query))
		{
			echo "<h3>Phone number Record updated succesfuly</h3><br>";
		}
		else
		{
			echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
		}
	}
	
				?>
   </body>
</html>