<?php
	if(isset($_POST['exam']))
	{
		session_start();
		$con = mysqli_connect("localhost","root","","online_exam_system");
		$x = $_SESSION['name'];
		date_default_timezone_set('Asia/Dhaka');
		$date = date('m/d/Y h:i:s a', time());
		$scr = $_POST['res'];
		$sql ="Insert into Score(Num,Date_Time,Score) Values('$x','$date', $scr)";
		$s ="SELECT * FROM result WHERE Id = $x";
		$result = mysqli_query($con,$s);
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_array($result);
			$mark = $row['Marks'];
			if($scr > $mark)
			{
				$query = "UPDATE result SET Marks = '$scr' WHERE Id = '$x'";
				$result = mysqli_query($con,$query);
			}
		}
		if(mysqli_query($con,$sql))
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Inserted"); 
			location.href="User.php"';
			echo '</script>';											
		}
		
	}
?>