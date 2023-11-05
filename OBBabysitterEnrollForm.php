<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Babysitter Enroll Form Confirmation - Online Babysitters</title>
		<style>
body{ background-image:url("bg.jpg");
background-color:rgb(109,063,091);
font-size:115%;
color:Gray;
}
h1{
border:8px solid gray;
}

	
	</style>
</head>
<body align="center">
<h1> Online Babysitters</h1>
<h2>Babysitter Enroll Form Confirmation</h2><br><br>
      <?php
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Online Babysitters";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
			//Conndection established
			
			$query = "SELECT NumberOfBabysitters FROM Data";
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
			{ // output data of each row
				while($row = ($result->fetch_assoc()))
				{
					$noOfBbystr = $row['NumberOfBabysitters'];
				}
			}
			//Getting number of employees from data
			
			$noOfBbystr2=0;
			$query = "SELECT Name FROM Babysitters";
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
			{ 
				while($row = ($result->fetch_assoc()))
				{
					$noOfBbystr2++;
				}
			}
			else
			{
				echo "<h2>0 number of Babysitters in the table </h2> <br>";
			}
			echo "<h2>The number of babysitters were ".$noOfBbystr2."</h2>";
			// Getting the number of employees from employee table
			
			$generatedBbystrId=($noOfBbystr2 + 1);
			//Babysitter id generated
			$sum = rand(0,9);
			for($count=1; $count < 10; $count++)
			{
				$temp = rand(0,9);
				$sum = ($sum . $temp); 
			}
			$generatedBbystrPassword = $sum;
			//Babysitter id generated

			//emp password generated
			if((isset($_POST['name'])))
			{
				$name = ($_POST['name']);
			}
			if((isset($_POST['address'])))
			{
				$address = ($_POST['address']);
			}
			if((isset($_POST['contactNo'])))
			{
				$contactno= ($_POST['contactNo']);
			}
			if((isset ($_POST['EmergencyContactNo'])))
			{
				$emergencycontactno = ($_POST['EmergencyContactNo']);
			}
			if((isset($_POST['workTime'])))
			{
				$worktime = ($_POST['workTime']);
			}
			if((isset($_POST['PS'])))
			{
				$ps = ($_POST['PS']);
			}
			
			$query = "INSERT INTO Babysitters (Id, Password, Name, Address, PhoneNo, PhoneNo2, TimeOfShift, OfferedServices)
			VALUES ('$generatedBbystrId', $generatedBbystrPassword, '$name', '$address', '$contactno', '$emergencycontactno', '$worktime', '$ps')";
			if($conn->query($query))
			{
				echo "<h2>New babysitter record created successfully</h2>";
				echo "<h2>The generated Babysitter id is ".$generatedBbystrId."</h2>";
				echo "<h2>The generated Babysitter password is ".$generatedBbystrPassword."</h2>";
				$noOfBbystr2=($noOfBbystr2+1);
				$query2="UPDATE Data SET NumberOfBabysitters='$noOfBbystr2'";
				if($conn->query($query2))
				{
					echo "<h2>Number of Babysitter record updated successfully</h2><br><br>";
				}
				else
				{
					echo "error: " . $query . "<br>" . $conn->error."<br>";
				}
			}
			else
			{
				echo "error: " . $query . "<br>" . mysqli_error($conn)."<br>";
			}			
	  ?>
   </body>
</html>