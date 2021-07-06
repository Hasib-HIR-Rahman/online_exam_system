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
		<link href="assets/css/AddingQues.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="AddQues.php" method="POST">
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
								<a href="AddQues.php"><h3> Add Question </h3></a>
								<a href="ViewQues.php"><h3> View Question list</h3></a>
								<a href="Update.php"><h3> Update Question </h3></a>
								<a href="DeleteQues.php"><h3> Delete Question </h3></a>
							</div>
						</div>
					</div>
				</div>
				<div class="right">
					<h1>Add question</h1>
				</div>
				<div class="ques">
					<h2>Question: </h2>
					<input type="text" name="ques">
				</div>
				<div class="opt1">
					<h3>Option 1: </h3>
					<input type="text" name="opt1">
				</div>
				<div class="opt2">
					<h3>Option 2: </h3>
					<input type="text" name="opt2">
				</div>
				<div class="opt3">
					<h3>Option 3: </h3>
					<input type="text" name="opt3">
				</div>
				<div class="opt4">
					<h3>Option 4: </h3>
					<input type="text" name="opt4">
				</div>
				<div class="crrct">
					<h3>Correct Answer: </h3>
					<input type="text" name="ans">
				</div>
				<div class="add">
					<input type="submit" name="add" value="Add">
				</div>
				<div class="footer">
				
				</div>
			</div>
		</form>
	</body>
</html>