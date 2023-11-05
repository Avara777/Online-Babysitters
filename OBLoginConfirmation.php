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
   <?php error_reporting (E_ALL ^ E_NOTICE); ?>
		<?php
		echo "<br><br>";
		$serverName = "localhost";	//connection to Db
		$userName = "root";
		$dbPswrd = "";
		$dbName = "Online Babysitters";
		$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error);	//connection to Db 
				
		if(($_POST['ID']))	//storing user id in php variable
		{
			$id = $_POST['ID'];
			$_SESSION['ID'] = $id;
		}
		if(($_POST['PASSWORD']))	//storing user password in php variable
		{
			$password = $_POST['PASSWORD'];
			$_SESSION['PASSWORD'] = $password;
		}
		global $empid;
		global $emppass;
			
			$query = "(SELECT Id, Password FROM Babysitters WHERE Id='$id') UNION (SELECT Id, Password FROM Children WHERE Id= '$id')";
			
			#SELECT 
			#		Babysitters.Id AS table1_i,
			#		Babysitters.Password AS table1_j,
			#		Children.Id AS table2_i,
			#		Children.Password AS table2_j
			#	FROM 
			#		Babysitters
			#	JOIN 
			#		Children 
			#	ON 
			#		table1_i= table2_i
			#	AND
			#		table2_i= table2_j
			#	WHERE
			#		Id= '$id'"
			#(SELECT Id, Password FROM Babysitters WHERE Id='$id') UNION (SELECT Id, Password, FROM Children WHERE Id= $id)";  //Creating Babysitter query for login
			#$query = "SELECT Id, Password, FROM Babysitters WHERE Id='$id' UNION SELECT Id, Password, FROM Children WHERE Id= '$id'";  //Creating Babysitter query for login

			if($id !== 'XXX')
			{
				$result = ($conn->query($query));
				if ($result->num_rows > 0)
				{ 
					while($row = ($result->fetch_assoc()))
					{
						
						$empid =	 str($row['Id']);
						echo $empid.'<br>';
						$emppass =  str($row['Password']);
						echo $emppass.'<br><br>';
					}
				}
				global $i;
				global $p;
				if(($id === $empid) and ($password === $emppass))
				{
					?><script>
					location.href = 'http://localhost/Online Babysitters/BabysitterInterface.html';
					</script>
					<?php
				}
				else
				{
					echo "<h2>login id or password wrong</h2><br>";
				}
			}			
			if($id == 'ad1')
			{
			$query = "SELECT Id, Password FROM Admin WHERE Id='$id'";
			
			global $i;
			global $p;
			$result = ($conn->query($query));
			if ($result->num_rows > 0)
						{ 
							while($row = ($result->fetch_assoc()))
							{
							 $i=	 $row['Id'];
							 $p=  $row['Password'];
							}
						}
			if(($i == $id) and ($p === $password))
			{
				?><script>
					location.href = 'http://localhost/Online Babysitters/AdminInterface.html';
					</script>
					<?php					
			}
			else
			{
				echo "<h2>login id or password not correct for Administrator</h2><br>";
			}
			}
	  ?>
   </body>
</html>