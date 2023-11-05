<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Update Admin Profile - Online Babysitters</title>
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
<h1>Update Admin Profile - Online Babysitters</h1><br>
      <?php
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Online Babysitters";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
			//Conndection established
			
			if((isset($_POST['mobileNo'])))
			{
				$mobileno = ($_POST['mobileNo']);
			}
			if((isset($_POST['password'])))
			{
				$password = ($_POST['password']);
			}
			
			$id= $_SESSION['ID'];
			$query = "UPDATE Admin SET Password='$password', PhoneNo='$mobileno' WHERE Id='$id'";
			if($conn->query($query))
			{
				echo "<h2> Admin record updated successfully</h2><br>";
			}
			else
			{
				echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
			}			
	  ?>
   </body>
</html>