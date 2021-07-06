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
		<link href="assets/css/User.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form>
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
					<div class="right">
						<div class="text1">
							<h3>Test your knowledge</h3>
						</div>
						<div class="text2">
							<h4>This is a multiple choice quize</h4>
						</div>
						<?php
							$con = mysqli_connect("localhost","root","","online_exam_system");
							$sql = "SELECT * FROM exam_info";
							$res = mysqli_query($con,$sql);
							if(mysqli_num_rows($res) > 0)
							{
								$row = mysqli_fetch_array($res);
								$x = $row['Question_Num'];
							}
							
						?>
						<div class="text3">
							<h3>Number of question: <?php echo $x; ?></h3>
						</div>
						<div class="text4">
							<h3>Time for each question: 60 sec</h3>
						</div>
						<a href="exam.php"><input type="button" name="exam" value="Start Test"></a>
					</div>
					<div class="context">
						<p>"Our online test generator will help you creating your online exam. 
						You’ve decided to give an online examination.
						Now you’re wondering which steps to follow to accomplish that.
						Good question! This article will you show a small overview that 
						you will have to take for putting on an online examination."</p>
					</div>
					<div class="footer">
						<h3>Contact with us: +8801777-777777 or:</h3>
						<div class="mail">
							<a href="http://www.gmail.com"><img src="images/images16.jpg" width="50" height="40"></a>
						</div>
						<div class="fb">
							<a href="http://www.facebook.com"><img src="images/images(14).jpg" width="50" height="40"></a>
						</div>
						<div class="tweet">
							<a href="http://www.tweeter.com"><img src="images/images(18).jpg" width="50" height="40"></a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>