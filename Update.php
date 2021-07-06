<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("Location:index.php");
	}
	$con = mysqli_connect("localhost","root","","online_exam_system");
	$sql = "SELECT * FROM test ORDER BY Id ASC";
	$result = mysqli_query($con,$sql);
?>

<html>
	<head>
		<title>Add Question</title>
		<link href="assets/css/Update.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<form action="UpdateQues.php" method="POST">
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
								<a href="AddingQues.php"><h3> Add Question </h3></a>
								<a href="Update.php"><h3> View Question list</h3></a>
								<a href="Update.php"><h3> Update Question </h3></a>
								<a href="DeleteQues.php"><h3> Delete Question </h3></a>
							</div>
						</div>
					</div>
				</div>
				<div class="right">
					<h1>Update Question</h1>
				</div>
				<div class="text">
					<select name="emloyee_list" id="emloyee_list">
						<option value="">SELECT question</option>
						<?php
							while($row = mysqli_fetch_array($result))
							{
								echo '<option value="'.$row['Id'].'">'.$row["Id"].'</option>';
							}
						?>
					</select>
					<input type="button" id="search" value="Search">
				</div>
				<div class="ques">
					<h2>Question: </h2>
					<textarea name="ques" id="Question" style="width:400px; margin-left: 150px; margin-top: -50px;"></textarea>
				</div>
					
				<div class="opt1">
					<h3>Option 1: </h3>
					<textarea id="Option1" name="Opt1" style="width:300px; margin-left: 110px; margin-top: -45px;"></textarea>
				</div>
				<div class="opt2">
					<h3>Option 2: </h3>
					<textarea id="Option2" name="opt2" style="width:300px; margin-left: 110px; margin-top: -45px;"></textarea>    
				</div>
				<div class="opt3">
					<h3>Option 3: </h3>
					<textarea id="Option3" name="opt3" style="width:300px; margin-left: 110px; margin-top: -45px;"></textarea>
				</div>
				<div class="opt4">
					<h3>Option 4: </h3>
					<textarea id="Option4" name="opt4" style="width:300px; margin-left: 110px; margin-top: -45px;"></textarea>
				</div>
				<div class="crrct">
					<h3>Correct Answer: </h3>
					<textarea id="Answer" name="ans"style="width:400px; margin-left: 170px; margin-top: -50px;"></textarea>	
				</div>
				<div class="add">
					<input type="submit" name="add" value="Update">
				</div>
				<div class="footer">
					
				</div>	
			</div>
		</form>
	</body>
</html>
<script>
$(document).ready(function(){
	$('#search').click(function(){
		var id = $('#emloyee_list').val();
		if(id !="")
		{
			$.ajax({
				url:"fetch.php",
				method:"POST",
				data:{id:id},
				dataType:"JSON",
				success:function(data)
				{
					$('#Question').text(data.Question);
					$('#Option1').text(data.Option1);
					$('#Option2').text(data.Option2);
					$('#Option3').text(data.Option3);
					$('#Option4').text(data.Option4);
					$('#Answer').text(data.Answer);
				}
			})
		}
		else
		{
			alert("Plz select the question");
			
		}
	});
});
</script>