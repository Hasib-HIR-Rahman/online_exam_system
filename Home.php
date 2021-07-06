<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("Location:index.php");
}
?>
<html>
	<head>
		<title>Admin interface</title>
		<link href="assets/css/Home.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="main">
			<div class="header">
				<div class="headertext">
					<h2>Online Exam System</h2>
				</div>
				<div class="menu">
					<ul>
						<li><a href="Home.php">Home</a></li>
						<li><a href="Manage_User.php">Manage User</a></li>
						<li><a href="Result.php">Result</a></li>
						<li><a href="Account.php">Account</a></li>
						<li><a href="Logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="thing">
				<div class="content">
					<div class="left">
						<div class="topic">
							<h2> Your Activity:</h2>
							<hr>
						</div>
						<div class="activity">
							<a style="color: white;" href="AddingQues.php"><h3> Add Question </h3></a>
							<a style="color: white;" href="ViewQues.php"><h3> View Question list</h3></a>
							<a style="color: white;" href="Update.php"><h3> Update Question </h3></a>
							<a style="color: white;" href="DeleteQues.php"><h3> Delete Question </h3></a>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<h1>Welcome To Admin Panel</h1>
					<h3>Admin can manage User and exam from here</h3>
			</div>
			<div class="footer">
			
			</div>
		</div>
	</body>
</html>