<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("Location:index.php");
	}
?>
<html>
	<head>
		<title>Add Question</title>
		<link href="assets/css/Manage_User.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
				<div class="right">
						<h1>View User List</h1>
					<?php
						$con=mysqli_connect("localhost","root","","online_exam_system");
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT * FROM user");

						echo "<table border='1' width='100%' >
						<tr allign='center'>
							<th>UserId</th>
							<th>User Name</th>
							<th>E-mail</th>
							<th>Age</th>
							<th>Gender</th>
						</tr>";

						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['ID'] . "</td>";
							echo "<td>" . $row['Name'] . "</td>";
							echo "<td>" . $row['Mail'] . "</td>";
							echo "<td>" . $row['Age'] . "</td>";
							echo "<td>" . $row['Gender'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";

						mysqli_close($con);
					?>
				</div>
			</div>
		</form>
	</body>
</html>