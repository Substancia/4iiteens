<!DOCTYPE html>
<html>
<head>
        <link rel="icon" type="png" href="icon.png">
	<title>
                Test
	</title>
</head>
<body>

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

    if(isset($_POST['submit'])){
        $sql ="INSERT INTO test (name,phone) VALUES ('".$_POST["name"]."','".$_POST["phone"]."');";
        $result = $conn->query($sql);
        header("Location: pay.php?checkout=automatic");
	    exit;
    }
    ?>

	<center>
<br><br><br>
<h1>Test</h1>
	<form method="post" >
		<b>Name :</b>
		<input name="name" id="name" type="text" class="inputvalues" placeholder="Name" required/><br><br>
	 	<b>Phone :</b>
		<input name="phone" id="phone" type="text" class="inputvalues" placeholder="1234567890" required/><br><br>
		<center>	
		<input name="submit" type="submit" value="Proceed to payment"><br><br>
	</center>
	</form>
</body>
</html>