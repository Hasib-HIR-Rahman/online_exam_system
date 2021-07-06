<?php
	if(isset($_POST['add']))
	{
		$x = $_POST['Ques'];
		$y = $_POST['opt1'];
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
		$query = "DELETE from test where Id='$id'";
		if(mysqli_query($con,$query))
		{
			echo "Rows Deleted";
		}
		else
			echo "Failed";
	}
?>