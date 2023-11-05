<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Manage Babysitters - Online Babysitters</title>

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
<h2>Manage Babysitters</h2><br><br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
	
	$IdCount=0;
	?>
	<script>
		var IdDiv="<?php echo $IdUpd;?>";
		var IdSub="<?php echo $IdSub;?>";	
	</script>
	<table align="center" border="1" width="50%" height="50">
		<tr>
			<td width="10%">
				<form action="http://localhost/Online Babysitters/OBManageBabysittersConfirmation.php" method="post">
				<b>Delete</b>
				<div name="DELID" id="delId" style="display:none">
				</div>
			</td>
			<td width="50%" colspan="2">
					<label for="delId" >Enter Id(to delete):</label>
					<input type="tel" name="DELID" id="delId"  required></input>
			</td>
			<td width="50%" >
					<input type="submit" name="SUB" id="sub" value="Delete"></input>
			</td>
			</form>
		</tr>
		<tr>
			<td align="center" width="10%" rowspan="5">
				<form action="http://localhost/Online Babysitters/OBManageBabysittersConfirmation.php" method="post">
				<b>Update</b>
			</td>
			<td  colspan="2">
				<label>Enter new Id</label>
			</td>
			<td colspan="4">
				<input type="tel" name="ID" required></input>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>Enter new Name</label>
				</td>
				<td colspan="4">
					<input type="text" name="NAME" required></input>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>Enter new Phone number</label>
				</td>
				<td colspan="4">
					<input type="tel" name="PHNO" required></input>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label for="delId" >Enter Id(to modify):</label>
					<input type="tel" name="MODID" id="modId"  required></input>
				</td>
				<td colspan="4">
					<input type="submit" value="Modify"></input>
				</td>
			</tr>
				</tr>
				</form>
				</div>
			</td>					
		</tr>
	</table>
	<?php
		$query = "SELECT Id, Name, PhoneNo FROM Babysitters";
		$result=($conn->query($query));
		if($result->num_rows>0)
		{
			while($row=($result->fetch_assoc()))
			{
				?>
				<table align="center" border="1" > 
					<tr >
						<td  width="10%" align="center">
							<?php
							$Id=($row['Id']);
							echo "<b>Id: </b>".$Id."<br>";
							$Name=$row['Name'];
							echo "<b>Name: </b>".$Name."<br>";
							$phno=$row['PhoneNo'];
							echo "<b>Phone number: </b>".$phno."<br><br>";
							$IdCount++;
							?>
							<input type="hidden" value="" name="Id" id="hiddenField"></input>
							<script>
								var Id="<?php echo $Id; ?>"; 			//for displaying Ids on php page
								var IdCount="<?php echo $IdCount; ?>";
								document.getElementById("hiddenField").id=IdCount;
								document.getElementById(IdCount).value=Id;
							</script>		
					</form>
						</td>
					</tr>						
				</table>
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