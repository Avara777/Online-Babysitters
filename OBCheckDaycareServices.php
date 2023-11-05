<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Babysitter Services - Online Babysitters</title>

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
<h2>Babysitter Services</h2><br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
		$IdCount=0;
		$query = "SELECT * FROM Daycares";
		$result=($conn->query($query));
		if($result->num_rows>0)
		{
			while($row=($result->fetch_assoc()))
			{
				echo "<table align='center' border='1' > <tr ><td   align='center' width='200'>";
				$Id=($row['Id']);
				echo "<b>Id: </b></td><td width='400'>".$Id."<br></td></tr>";
				$Name=$row['Name'];
				echo "<tr><td width='200'><b>Name: </b></td><td width='400'>".$Name."<br></td></tr>";
				$desc=$row['Description'];
				echo "<tr><td width='200'><b>Description: </b></td><td width='400'>".$desc."</td></tr>";
				$ba=$row['BabysittersAvailable'];
				echo "<tr><td width='200'><b>Babysitters Available: </b></td><td width='400'>".$ba."</td></tr>";
				$s=$row['Services'];
				echo "<tr><td width='200'><b>Services: </b></td><td width='400'>".$s."</td></tr></table>";
				echo "<br><br>";
				$IdCount++;
				?>
							<input type="hidden" value="" name="Id" id="hiddenField"></input>
							<script>
								var Id="<?php echo $Id; ?>"; 			//for displaying Ids on php page
								var IdCount="<?php echo $IdCount; ?>";
								document.getElementById("hiddenField").id=IdCount;
								document.getElementById(IdCount).value=Id;
							</script>		
					
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