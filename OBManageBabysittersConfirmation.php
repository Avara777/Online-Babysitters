<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Manage Babysitters Confirmation - Online Babysitters</title>

<style>
body{ background-image:url("bg.jpg");
background-color:rgb(109,063,091);
font-size:115%;
color:silver;
}
h1{
border:8px solid gray;
}
.class1 {
background-color:gray;
border:none;
color:white;
padding:15px 32px;
text-align: center;
text-decoration: none;
display:inline-block:
font-size:26px;
margin:4px 2px;
cursor:pointer;
}
.class1:hover{
background-color:rgb(191, 191, 191);
color:black;
}
.class2{
background-color: gray;
}


</style>
	
</head>
<body align="center">
<h1>Online Babysitters</h1>
<h2>Manage Babysitters Confirmation</h2><br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
	$NumberOfBabysitters=0;
	if(isset($_POST['MODID']))
	{
		$modId=$_POST['MODID'];		
	}
	if(isset($_POST['DELID']))
	{
		$delId=$_POST['DELID'];
		$query = "DELETE FROM Babysitters WHERE Id='$delId'";
		if($conn->query($query))
		{
			$query = "SELECT * FROM Data";
			$result=($conn->query($query));
			if($result->num_rows>0)
			{
				while($row=($result->fetch_assoc()))
				{
					$NumberOfBabysitters =$row['NumberOfBabysitters']."<br>";
				}
				$NumberOfBabysitters--;
				echo "<h3>Record deleted succesfuly</h3><br>";			
				$query2="UPDATE Data SET NumberOfBabysitters='$NumberOfBabysitters'";
				if($conn->query($query2))
				{
					echo "Number of babysitters record updated succesfuly<br>";
				}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
			}
			else
			{
				echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
			}	
		}
		else
		{
			echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
		}
	}
	if(isset($_POST['ID']))
	{
		$id=$_POST['ID'];		
		$query = "UPDATE Babysitters SET Id='$id' WHERE Id='$modId'";
		if($conn->query($query))
		{	
		echo "<h3>Id Record updated succesfuly</h3><br>";
		}
		else
		{
			echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
		}
	}
	if(isset($_POST['NAME']))
	{
		$name=$_POST['NAME'];
		$query = "UPDATE Babysitters SET Name='$name' WHERE Id='$id'";
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
		$query = "UPDATE Babysitters SET PhoneNo='$phno' WHERE Id='$id'";
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