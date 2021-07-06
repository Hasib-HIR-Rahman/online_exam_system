<?php
	$con = mysqli_connect("localhost","root","","online_exam_system");
	if(isset($_POST['sub']))
	{
		$x = $_POST['num'];
		$sql = "UPDATE exam_info SET Question_num = '$x'";
		$result = mysqli_query($con,$query);
		if(mysqli_query($con,$sql))
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Updated"); 
			location.href="Account.php"';
			echo '</script>';											
		}
	}
	if(isset($_POST['mit']))
	{
		$prev = $_POST['curr'];
		$new = $_POST['new'];
		if($prev!="" && $new!="")
		{
			if($prev != $new)
			{
				$sql = "UPDATE user SET Password = '$new' WHERE ID = '4'";
				if(mysqli_query($con,$sql))
				{
					echo '<script language="javascript">';
					echo 'alert("Successfully Updated"); 
					location.href="Account.php"';
					echo '</script>';											
				}
			}
			else
				echo "New password match with previous password";
		}
		else
			echo "Cant be empty";
	}
?>