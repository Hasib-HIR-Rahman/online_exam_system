<?php
  session_start();
 if(!isset($_SESSION['name']))
 {
	  header("Location:index.php");
  }
?>
<html>
	<head>
		<title>User interface</title>
		<link href="assets/css/User_Account.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
		<form action="User_Update.php" method="POST">
			<div class="menu">
				<div class="main">
					<div class="header">
						<h1>Online Exam System</h1>
					</div>
					<div class="HEADERTEXT">
						<h2>Welcome to Online Lab Exam</h2>
					</div>
					<div class="left">
						<h2>Your Activity</h2>
						<hr>
						<div class="activity" allign="center">
							<a href="User.php"><h4>Home</h4></a>
							<a href="Prev_Res.php"><h4>Previous Result</h4></a>
							<a href="User_Account.php"><h4>Account</h4></a>
							<a href="Logout.php"><h4>Logout</h4></a>
						</div>
					</div>
					<div class="pass">
						<div class="word">
							<h3>Change password: </h3>
						</div>
						<div class="current">
							<h5>Current Password:</h5><input type="password" name="curr">
						</div>	
						<div class="new">
							<h5>New Password:</h5><input type="password" name="newp">
						</div>
						<div class="in">
							<input type="submit" name="sub" value="Submit">
						</div>
					</div>
					<div class="right">
						<div class="name">
							<h3>Chat with admin</h3>
						</div>	
						<div class="text">
							<input type="text" name="new">
						</div>
						<div class="inp">
							<input type="submit" name="mit" value="Send">
						</div>
					</div>
					<?php
						$x = $_SESSION['mail'];
						$con = mysqli_connect("localhost","root","","online_exam_system");
						$sql = "SELECT COUNT(Id) FROM reply WHERE Mail='$x'";
						$res = mysqli_query($con,$sql);
						//$query = "SELECT * FROM reply WHERE Mail='$x'";
						//$result = mysqli_query($con,$query);
						if(mysqli_num_rows($res) > 0)
						{
							$row = mysqli_fetch_array($res);
							$xx = $row['COUNT(Id)'];
						}
						// if(mysqli_num_rows($result) > 0)
						// {
							// $rows = mysqli_fetch_array($result);
							// $y = $rows['Text'];
						// }
						mysqli_close($con);
					?>
					<div class="FOOTER">
						<h2>New Message: <?php echo $xx; ?></h2>
						<hr>
						<div class="message" allign="center">
							<h3 id="mess"></h3>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
<?php
	$con = mysqli_connect("localhost","root","","online_exam_system");
	//$query = "SELECT * FROM reply WHERE Mail='$x'";
	$query = "select * FROM reply WHERE Mail='$x' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result) > 0)
	{
		$rows = mysqli_fetch_array($result);
		$y = $rows['Text'];
	}
	echo $rows['Text'];
	mysqli_close($con);
?>
<script>
	var mes = "<?php echo $y; ?>";
	var rep = <?php echo $xx; ?>;
	if(rep > 0)
	{
		document.getElementById("mess").innerHTML = mes;
	}
</script>