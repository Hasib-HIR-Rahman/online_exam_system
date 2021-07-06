<html>
	<head>
		<title>User interface</title>
		<link href="css/exam.css" rel="stylesheet" type="text/css" />
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
						<input type="radio" name="opt1" value="1">
						<h3 id="Option1"></h3>
					</div>
					<div class="opt2">
						<input type="radio" name="opt1" value="2">
						<h3 id="Option2"></h3>
					</div>
					<div class="opt3">
						<input type="radio" name="opt1" value="3">
						<h3 id="Option3"></h3>
					</div>
					<div class="opt4">
						<input type="radio"  name="opt1" value="4">
						<h3 id="Option4"></h3>
					</div>
					<div class="quit">
						<a href="User.php"><input type="button" name="opt1" value="Quit"></a>
					</div>
					<div class="next">
						<input type="button" onclick="display()"name="next" value="Next">
					</div>
				</div>
			</div>
		</form>
	</body>
</html>
<script>
	
	var timer;
	var id = 1;
	function display(){
		alert($('input[name=opt1]:checked').val());
		id++;
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
window.onload = function () {
	timer();
	Question();
}

	function timer(){
		var fiveMinutes = 60,
        display = document.querySelector('#time');
		startTimer(fiveMinutes, display);
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
</script>
