<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Babysitter Enroll Form - Online Babysitters</title>

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
<h2>Child Enroll Form Confirmation</h2><br>
      <?php
			$serverName = "localhost";
			$userName = "root";
			$dbPswrd = "";
			$dbName = "Online Babysitters";
			$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
			//Conndection established
			
			$query = "SELECT NoOfChildren FROM Data";
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
			{ // output data of each row
				while($row = ($result->fetch_assoc()))
				{
					$noOfChildren = $row['NoOfChildren'];
				}
			}
			else{echo "Number of Children are 0";}
			//Getting number of Children from data
			
			$noOfChildren2=0;
			$query = "SELECT Id FROM Children";
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
			{ 
				while($row = ($result->fetch_assoc()))
				{
					$noOfChildren2++;
				}
			}
			echo "<h2>The number of babysitters were ".$noOfChildren2."</h2><br>";
			// Getting the number of employees from employee table
			
			$generatedChildrenId=($noOfChildren2 + 1);
			//Child id generated
			$sum = rand(0,9);
			for($count=1; $count < 10; $count++)
			{
				$temp = rand(0,9);
				$sum = ($sum . $temp); 
			}
			$generatedChilrenPassword = $sum;
			//Child id generated

			//Child password generated
			if((isset($_POST['name'])))
			{
				$name = ($_POST['name']);
			}
			if((isset($_POST['gender'])))
			{
				$gender = ($_POST['gender']);
				if($gender==='Male')
				{
					$gender='M';
				}
				else{$gender='F';}
			}
			if((isset($_POST['contactNo'])))
			{
				$contactno= ($_POST['contactNo']);
			}
			if((isset ($_POST['region'])))
			{
				$region = ($_POST['region']);
			}
			if((isset($_POST['age'])))
			{
				$age = ($_POST['age']);
			}
			$query = "INSERT INTO Children (Id, Password, Name, Gender, ContactNo, Region, Age)
			VALUES ('$generatedChildrenId', $generatedChilrenPassword, '$name', '$gender', '$contactno', '$region', '$age')";
			if($conn->query($query))
			{
				echo "<h2>New Child record created successfully</h2><br>";
				echo "<h2>The generated Child id is ".$generatedChildrenId."</h2><br>";
				echo "<h2>The generated Child password is ".$generatedChilrenPassword."</h2><br>";
				$noOfChildren2=($noOfChildren2+1);
				$query2="UPDATE Data SET NoOfChildren='$noOfChildren2'";
				if($conn->query($query2))
				{
					echo "<h2>Number of Children record updated successfully</h2><br><br>";
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