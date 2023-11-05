<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Enrollment details in period - Online Babysitters</title>
	
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
<h2>Enrollment details in desired period</h2>
<br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
	
	if(isset($_POST['YEAR']))
	{
		($year=($_POST['YEAR']));
		$query = "SELECT * FROM Babysitters WHERE InsertionTime LIKE '$year%'";
		$result=($conn->query($query));
	}
	if($result->num_rows === 0)
	{
		echo "<h3>No records exist of specified Time Period<br>";
	}
	else if($result->num_rows>0)
	{
		echo "<h3>Enrollments administered in ".$year.": </h3>";
		while($row=($result->fetch_assoc()))
		{
			echo "<b> <table align='center' border='1' ><tr ><td width='220'>";
			echo "Id: </td><td width='380'>";
			echo ($id =$row['Id']);
			echo "</td></tr><tr><td width='220'><br>";
			echo "Name: </td><td width='380'>";
			echo ($name =$row['Name']);
			echo "<br></td><tr></tr><tr><td width='220'>";
			echo "Offered Services: </td><td width='380'>";
			echo ($os =$row['OfferedServices']);
			echo "</td></tr></table><br><br></b>";
		}
	}
	else
	{
		echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
	}
	
		?>
   </body>
</html>