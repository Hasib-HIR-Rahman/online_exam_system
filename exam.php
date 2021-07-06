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
		<link href="assets/css/exam.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<form action="fetch.php" method="POST">
			<div class="menu">
				<div class="main">
					<div class="header">
						<h1>Online Exam System</h1>
					</div>
					
					<div class="ques">
						<h2>Question No: </h2>
						<h3 id="header">1</h3>
					</div>
					<div class="wait">
						<b><span id="time"></span><b>
					</div>
					<div class="Quesid">
						<h2>Question: </h2>
						<h3 id="Question"></h3>
					</div>
					<div class="opt1">
						<input type="radio" id="opt1" name="opt1" value="1">
						<h3 id="Option1"></h3>
					</div>
					<div class="opt2">
						<input type="radio" id="opt2" name="opt1" value="2">
						<h3 id="Option2"></h3>
					</div>
					<div class="opt3">
						<input type="radio" id="opt3" name="opt1" value="3">
						<h3 id="Option3"></h3>
					</div>
					<div class="opt4">
						<input type="radio" id="opt4" name="opt1" value="4">
						<h3 id="Option4"></h3>
					</div>
					<div class="quit">
						<a href="User.php"><input type="button" name="opt1" value="Quit"></a>
					</div>
					<div class="next">
						<input type="button" onclick="display()"name="next" value="Next">
					</div>
					<div class="result">
						<h4 id="score" name="mark"></h4>
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
<?php
	$con = mysqli_connect("localhost","root","","online_exam_system");
	$sql = "SELECT * FROM exam_info";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_array($result);
		$val = $row['Question_Num'];
	}
?>
<script>
	var num = <?php echo $val ?>;
	var timer,score=0,participate=0;
	var id = 1;
	function display(){
		if(document.getElementById('opt1').checked)
		{
			check(1);
			id++;
			document.getElementById('opt1').checked=false;
		}
		else if(document.getElementById('opt2').checked)
		{
			check(2);
			id++;
			document.getElementById('opt2').checked=false;
		}
		else if(document.getElementById('opt3').checked)
		{
			check(3);
			id++;
			document.getElementById('opt3').checked=false;
		}
		else if(document.getElementById('opt4').checked)
		{
			check(4);
			id++;
			document.getElementById('opt4').checked=false;
		}
		else {alert("Choose an answer");}
		timer();
		document.getElementById("header").innerHTML = id;
		$(document).ready(function(){
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
		}
		})
	});}
	 function startTimer(duration, display) {
     var timer = duration, minutes, seconds;
     setInterval(function () {
        seconds = timer;

         seconds = seconds < 10 ? "0" + seconds : seconds;

         display.textContent = "Time Left: 00:00:" + seconds;

        if (--timer < 0) {
			 display.textContent = "";
		   }
     }, 1000);
}
	 function timer(){
	 var fiveMinutes = 60,
         display = document.querySelector('#time');
		 startTimer(fiveMinutes, display);
	 }
window.onload = function () {
	Question();
	timer();
}
	function Question(){
		$(document).ready(function(){
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
		}
		})
	});
	}
	function check(x){
		var select;
		participate++;
		if(x==1){select = 1;}
		if(x==2){select = 2;}
		if(x==3){select = 3;}
		if(x==4){select = 4;}
		$(document).ready(function(){
		$.ajax({
		url:"fetch.php",
		method:"POST",
		data:{id:(id-1)},
		dataType:"JSON",
		success:function(data)
		{
			var ans;
			ans = data.Answer;
			if(ans == select){
			score++;document.getElementById("score").innerHTML = score;
			document.getElementById("score").style.visibility = "hidden";}
		}
		})
	});
	if(participate==num)
	{result(score);}
	}
	function result(z){
		var mark = z;
		var query = "?para1=" + mark;
		window.location.href =	"Score.php" + query;
	}
</script>
