<?php
	session_start();
?>
<!DOCTYPE html>
<html lang-"en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width", initial-scale=1.0>
    <title>Manage Offered Services - Online Babysitters</title>
	
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
<h2>Manage Offered Services</h2>
<br>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$dbPswrd = "";
	$dbName = "Online Babysitters";
	$conn = new mysqli($serverName,	$userName, $dbPswrd, $dbName) or die("connect failed: %s\n" . $conn->error); 
	//Conndection established
	
	$IdCount=0;
	$IdUpd=10;
	$IdSub=20;	?>
	<script>
		var IdDiv="<?php echo $IdUpd;?>";
		var IdSub="<?php echo $IdSub;?>";	
	</script>
	<table align="center" border="1" width="50%" height="50">
		<tr>
			<td width="10%">
				<form action="http://localhost/Online Babysitters/OBManageOfferedServicesConfirmation.php" method="post">
				<b>Delete</b>
			</td>
			<td width="80%" colspan="5">
					<label for="delId2" >Enter Id(to remove related offered services):</label>
					<input type="tel" name="DELID2" id="delId2"  required reset></input>
			</td>
			<td width="10%" colspan="2">
					<input type="submit" name="SUB" id="sub" ></input>
			</td>
			</form>
		</tr>
		<tr>
			<td align="center" width="10%">
				<form action="http://localhost/Online Babysitters/OBManageOfferedServicesConfirmation.php" method="post">
				<b>Update</b>
			</td>
			<td width="50%" colspan="4">
					Modify Offered Services:<br>
					<textarea name="updatedField" id="textDiv" value="" rows="6" cols="60" required></textarea><br>
					</td >
					<td width="35%" >
					<label for="updId2" >Enter Id(for update):</label>
					<input type="tel" name="UPDID2" id="updId2"  required></input>								
					</td>
					<td width="15%" >
					<input type="Submit" name="SUB" id="submitId"  ></input>
					</td>
				</tr>
				</form>
				</div>
			</td>					
		</tr>
	</table>
	<?php
		$query = "SELECT Id, Name, OfferedServices FROM Babysitters";
		$result=($conn->query($query));
		if($result->num_rows>0)
		{
			while($row=($result->fetch_assoc()))
			{
				?>
				
				<table align="center" border="1" width='100%'> 
					<tr>
						<td width="20%" align="left">
							<?php
							$Id=($row['Id']);
							echo "<b>Id: </b>".$Id."<br>";
							$Name=$row['Name'];
							echo "<b>Name: </b>".$Name."<br>";
							$OfferedServieces=$row['OfferedServices'];
							echo "<b>Offered Services provided: </b>".$OfferedServieces."<br><br>";
							$IdCount++;
							?>
							<input type="hidden" value="" name="Id" id="hiddenField"></input>
							<script>
								var Id="<?php echo $Id; ?>"; 			//for displaying Ids on php page
								var IdCount="<?php echo $IdCount; ?>";
								document.getElementById("hiddenField").id=IdCount;
								document.getElementById(IdCount).value=Id;
							</script>		
							</td>
						</tr>						
					</table>
					<script>
					function DeleteFunc()
					{	
						var x=document.getElementById("delId");
						var x2=document.getElementById("delId2");
						var y=document.getElementById("sub");
						if(x.style.display==="block")
						{
							x.style.display="none";
						}
						else
						{
							x.style.display="block";
						}
					}
					</script>
					<script>
					function UpdateFunc()
					{
						document.getElementById("UpdDiv").id=IdDiv;
						var x=document.getElementById(IdDiv);
						if(x.style.display==="block")
						{
							x.style.display="none";
						}
						else
						{
							x.style.display="block";
						}
						document.getElementById("submitId").id=IdSub;
						var y=document.getElementById(IdSub);
						if(y.style.display==="block")
						{
							y.style.display="none";
						}
						else
						{
							y.style.display="block";
						}
						IdDiv++;
						IdSub++;
					}		
					</script>
					</form>
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