<?php
	if(isset($_POST['add']))
	{
		$x = $_POST['ques'];
		$y = $_POST['Opt1'];
		$z = $_POST['opt2'];
		$p = $_POST['opt3'];
		$q = $_POST['opt4'];
		$r = $_POST['ans'];
		$con = mysqli_connect("localhost","root","","online_exam_system");
		if(!$con)
		{
			die("Connection Error: ".mysqli_connect_error()."<br/>");
		}
		$sql="SELECT Id FROM test WHERE Question='$x'";
		$result=mysqli_query($con,$sql);	
		$row = mysqli_fetch_array($result);
		$id = $row['Id'];
		$query = "UPDATE test SET Question='$x',Option1='$q',Option2='$z',Option3='$p',Option4='$y',Answer='$r' WHERE Id='$id'";
		if(mysqli_query($con,$query))
		{
			echo "Rows Updated";
		}
		else
			echo "Failed";
	}
?>