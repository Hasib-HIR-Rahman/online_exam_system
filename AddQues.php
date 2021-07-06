<?php
	if($_POST['add'])
	{
		$qstn = $_POST['ques'];             
		$mcq1 = $_POST['opt1'];
		$mcq2 = $_POST['opt2'];
		$mcq3 = $_POST['opt3'];
		$mcq4 = $_POST['opt4'];
		$crrct = $_POST['ans'];
		if($qstn=="" && $mcq1=="" && $mcq2=="" && $mcq3=="" && $mcq4=="" && $crrct=="")
		{
			echo "Answer can't be empty";
		}
		else
		{
			$con = mysqli_connect("localhost","root","","online_exam_system");
			if(!$con)
			{
				die("Databse not connected: ".mysqli_connect_error);
			}
			else
			{
				$sql = "Insert into test(Question,Option1,Option2,Option3,Option4,Answer) values('$qstn','$mcq1','$mcq2','$mcq3','$mcq4','$crrct')";
				if(mysqli_query($con,$sql))
				{	
					echo '<script language="javascript">';
					echo 'alert("Successfully Registered"); 
					location.href="AddingQues.php"';
					echo '</script>';
				}
			}
			mysqli_close($con);
		}
	}
?>