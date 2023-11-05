<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Manage Offered Services Confirmation- Online Babysitters</title>
	
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
<h2>Manage Offered Services Confirmation</h2><br><br>
      <?php
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Online Babysitters";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
			//Conndection established
			
			if (isset($_POST['DELID2'])) //Storing id for delete
			{
				$Id=$_POST['DELID2'];
				echo $Id."<br>";
			}
			if (isset($_POST['UPDID2']))		//Storing id for update
			{
				$updId2=$_POST['UPDID2'];
				echo $updId2."<br>";
			}
			if (isset($_POST['updatedField']))	//Storing modification
			{
				$updatedField=$_POST['updatedField'];
				echo $updatedField;
			}
			
			$delModification=""; 
			if(isset($_POST['DELID2']))
			{
				$updatedField="";
				$query = "UPDATE Babysitters  SET  OfferedServices='$updatedField' WHERE Id='$Id'";	
			}
			if(isset($_POST['UPDID2']))
			{
				$query = "UPDATE Babysitters  SET  OfferedServices='$updatedField' WHERE Id='$updId2'";
			}
				if($conn->query($query))
				{
					echo "<h2> Babysitter record updated successfully</h2><br>";
				}
				else
				{
					echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
				}
			
	  ?>
   </body>
</html>