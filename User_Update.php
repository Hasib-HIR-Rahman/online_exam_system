<?php
	$con = mysqli_connect("localhost","root","","online_exam_system");
	if(isset($_POST['mit']))
	{
		session_start();
		$mail = $_SESSION['mail'];
		$x = $_POST['new'];
		$sql = "INSERT INTO chat(Mail,Text,Seen) VALUES('$mail','$x','1')";
		$result = mysqli_query($con,$query);
		if(mysqli_query($con,$sql))
		{
			echo '<script language="javascript">';
			echo 'alert("Successfully Updated"); 
			location.href="User_Account.php"';
			echo '</script>';											
		}
	}
	if(isset($_POST['sub']))
	{
		$prev = $_POST['curr'];
		$new = $_POST['newp'];
		if($prev!="" && $new!="")
		{
			if($prev != $new)
			{
				session_start();
				$xx = $_SESSION['name'];
				$sql = "UPDATE user SET Password = '$new' WHERE ID = '$xx'";
				 if(mysqli_query($con,$sql))
				 {
					 echo '<script language="javascript">';
					 echo 'alert("Successfully Updated"); 
					 location.href="User_Account.php"';
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