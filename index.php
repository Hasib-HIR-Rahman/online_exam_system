<?php
session_start();
?>	
<html>
	<head>
		<title>O E S|Online Exam System|O E S</title>
		<link href="assets/css/index.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="menu">
				<div class="main">
					<div class="logo">
						<img src="images/logo.png" />
						<hr>
					</div>
					<div class="text">
						<h2>Online Exam System</h2>
						<hr>
					</div>
					<div class="user">
						<h4><strong>Email:</strong></h4>
						<input type="text" id="mail" name="email" placeholder="Enter Your Mail" size="30">
					</div>
					<div class="Pass">
						<h4><strong>Password:</strong></h4>
						<input type="Password" id="word" name="password" placeholder="Enter Password" size="30">
					</div>
					<div class="log">
						<hr>
						<input type="submit" name="login" value="Login">
					</div>
					<div class="signup">
						<input type="submit" name="signup"  value="Signup">
						<hr>
					</div>
					<div class="footer">
						<h4>Don't have an account?Then click Signup</h4>
					</div>
			  </form>
			</div>
				</div>
			</div>
		</form>
	</body>
</html>				
<?php
if(isset($_POST['login']))
{
	$con=mysqli_connect("localhost","root","","online_exam_system");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Retrieve Data

	$password=$_POST['password'];
	$email=$_POST['email'];
	$sql="SELECT * FROM user WHERE Mail='$email' AND Password='$password'";
	$result=mysqli_query($con,$sql);	
	if(mysqli_num_rows($result)>0)
	{
		$row=mysqli_fetch_array($result);
		$_SESSION['name'] = $row['ID'];
		$_SESSION['mail'] = $row['Mail'];
		if($email=="farukovi29@gmail.com" && $_SESSION['name'] == '4')
		{
			header("Location:Home.php");
		}
		else
			header("Location:User.php");
	}
	else
	{
		echo "No data found.<br/>";
	}

	
mysqli_close($con);		
}
if(isset($_POST['signup']))
{
	header("Location:Registration.php");
}
?>