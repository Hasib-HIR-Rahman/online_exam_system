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
		<link href="assets/css/Score.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="kjk.php" method="POST">
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
							<h3>Congratulations</h3>
						</div>
						<div class="text3">
							<h3>Your Score: </h3>
						</div>
						<div class="text4">
							<p id="name" name="score"></p>
							<input type="HIDDEN" id="scr" name="res">
							<script type="text/javascript">
								var x;
								var queryString = decodeURIComponent(window.location.search);
								queryString = queryString.substring(7);
								var queries = queryString.split("&");
								document.getElementById("name").innerHTML = queries[0];
								document.getElementById("scr").value = queries[0];
							</script>
						</div>
						<input type="submit" name="exam" value="Submit Your Score">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>