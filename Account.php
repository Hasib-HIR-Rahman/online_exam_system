  <?php
  session_start();
 if(!isset($_SESSION['name']))
 {
	  header("Location:index.php");
  }
 ?>
<html>
	<head>
		<title>Admin Information</title>
		<link href="assets/css/Account.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="Admin.php" method="POST">
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
							<li><a href="Account.html">Account</a></li>
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
								<a href="AddingQues.php"><h3> Add Question </h3></a>
								<a href="Update.php"><h3> View Question list</h3></a>
								<a href="Update.php"><h3> Update Question </h3></a>
								<a href="DeleteQues.php"><h3> Delete Question </h3></a>
							</div>
						</div>
					</div>
				</div>
				<?php
					$con = mysqli_connect("localhost","root","","online_exam_system");
					$sql = "SELECT COUNT(ID) FROM user";
					$res = mysqli_query($con,$sql);
					if(mysqli_num_rows($res) > 0)
					{
						$row = mysqli_fetch_array($res);
						$x = $row['COUNT(ID)'];
					}
					
				?>
				<div class="right">
					<div class="total_user">
						<h3>Total User</h3>
						<hr>
						<h4><?php echo $x; ?></h4>
					</div>
				<?php
					$con = mysqli_connect("localhost","root","","online_exam_system");
					$sql = "SELECT COUNT(ID) FROM test";
					$res = mysqli_query($con,$sql);
					if(mysqli_num_rows($res) > 0)
					{
						$row = mysqli_fetch_array($res);
						$y = $row['COUNT(ID)'];
					}
					
				?>
					<div class="give_exam">
						<h3>Total Question</h3>
						<hr>
						<h4><?php echo $y; ?></h4>
					</div>
				<?php
					$con = mysqli_connect("localhost","root","","online_exam_system");
					$sql = "SELECT COUNT(Mail) FROM chat WHERE Seen=1";
					$res = mysqli_query($con,$sql);
					if(mysqli_num_rows($res) > 0)
					{
						$row = mysqli_fetch_array($res);
						$z = $row['COUNT(Mail)'];
					}
					
				?>
					<div class="message">
						<h3>New Message</h3>
						<hr>
						<a href="message.php"><h4><?php echo $z; ?></h4></a>
					</div>
					<div class="pass">
						<div class="word">
							<h3>Change password: </h3>
						</div>
						<div class="current">
							<h5>Current Password:</h5><input type="password" name="curr">
						</div>	
						<div class="new">
							<h5>New Password:</h5><input type="password" name="new">
						</div>
						<div class="in">
							<input type="submit" name="mit" value="Submit">
						</div>
					</div>
					<div class="question_num">
						<h5>Change the Number of Question:</h5>
						<input type="number" name="num">
						<div class="but">
							<input type="submit" name="sub" value="Update">
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>