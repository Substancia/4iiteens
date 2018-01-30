<!DOCTYPE html>
<html>
<head>
        <link rel="icon" type="png" href="icon.png">
	<title>
                Test
	</title>
</head>
<body>
	<center>
	<img src="icon.png" style="width:200px;height:200px;"><br><br><br>
<h1>Test upload</h1><br>
	<?php 
	
	$servername= "localhost";			//setting connection parameter
	$username="substancia";		//setting connection parameter
	$password="Sentienta@7";			//setting connection parameter
	$dbname="i3998540_wp1";		//setting connection parameter

	//create connection
	$conn = new mysqli($servername,$username,$password,$dbname);

	//check for connection error
	if ($conn->connect_error)
	{
		die("No network!" . $conn->connect_error);	//handling connection error
	}
	$name=$_POST["name"];
	$phone=$_POST["phone"];
	$sql ="INSERT INTO test (name,phone)
VALUES ('$name','$phone');";		//adding new user info into database
	$result = $conn->query($sql);
	echo "Data entered successfully!";
	$sql ="SELECT id FROM test WHERE name='$name'";		//displaying info
	$result = $conn->query($sql);
	if ($result->num_rows > 0 )					//multiple users with identical credentials
	{
		while($row=$result->fetch_assoc())
		{
			$id=$row["id"];
		}
		setcookie('id', $id, time() + (86400 * 30), "/");
		setcookie('name', $name, time() + (86400 * 30), "/");
		setcookie('phone', $phone, time() + (86400 * 30), "/");
	}
	?>
	<h3>id:-<?php echo "U000".$id;?></h3>
	name: <?php echo $name;?><br><br>
	phone: <?php echo $phone;?><br><br>
	<button onclick="window.location.href='pay.php?checkout=automatic'">Proceed payment</button><br><br>
	</center>
</body>
</html>