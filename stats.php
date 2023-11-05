<?php
	session_start();
?>
<!DOCTYPE html>
<html>
   <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
	<title>Online Babysitters</title>
	
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
<body  align="center">
<h1>Online Babysitters</h1>
<h2>Statistics</h2><br><br>
   <?php error_reporting (E_ALL ^ E_NOTICE); ?>
		<?php
		echo "<br><br>";
		$serverName = "localhost";	//connection to Db
		$userName = "root";
		$dbPswrd = "";
		$dbName = "Online Babysitters";
		$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection to Db 
		
		$query= "SELECT NumberOfBabysitters, TotalEnrollments FROM Data";
		$result = ($conn->query($query));
				if ($result->num_rows > 0)
				{ 
					while($row = ($result->fetch_assoc()))
					{
		?><table align='center'>
			<tr>
				<td>Number of Babysitters:
				</td>
				<td>
					<?php	echo $row['NumberOfBabysitters']."<br>";
				?></td>
			</tr>
			<tr>
				<td>Total Enrollments:
				</td>
				<td><?php
						echo $row['TotalEnrollments']."<br><br>";
					}
				}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
				?></td>
			</tr>
		</table>
   </body>
</html>