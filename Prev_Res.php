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
		<link href="assets/css/Prev_Res.css" rel="stylesheet" type="text/css" />
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
						<h1>Your result info:</h1>
					<?php
						$con=mysqli_connect("localhost","root","","online_exam_system");
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						$x = $_SESSION['name'];
						$result = mysqli_query($con,"SELECT * FROM score WHERE Num=$x");

						echo "<table border='1' width='100%' >
						<tr allign='center'>
							<th>Date And Time</th>
							<th>Score</th>
						</tr>";

						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['Date_Time'] . "</td>";
							echo "<td>" . $row['Score'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";

						mysqli_close($con);
					?>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>