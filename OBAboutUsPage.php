<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>About us - Online Babysitters</title>
	
	
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
<h2>About us</h2><br><br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established

		$query = "SELECT Description, ContactNumber, InternationalContactNumber, Email FROM Data";
		$result=($conn->query($query));
		if($result->num_rows>0)
		{
			while($row=($result->fetch_assoc()))
			{
				?>
							<div><?php
							$description=$row['Description'];
							echo $description."<br><br>";
							echo "Naeem Nasir<br>";
							echo "Making Pakistan proud since 1999<br><br><br><br><br>";
							?></div>
							<div><?php
							$ContactNumber=$row['ContactNumber'];
							echo "<b>Contact Number: </b>".$ContactNumber."<br><br>";
							?></div>
							<div><?php
							$InternationalContactNumber=$row['InternationalContactNumber'];
							echo "<b>International Contact Number: </b>".$InternationalContactNumber."<br><br>";
							?></div>
							<div><?php
							$email=$row['Email'];
							echo "<b>Email: </b>".$email."<br><br>";
							?></div>
					<?php
					}
				}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
				?>
   </body>
</html>
