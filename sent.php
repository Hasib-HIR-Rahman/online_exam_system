<?php
	if(isset($_POST['send']))
	{
		if($_POST['reply']!="")
		{
			$x = $_POST['reply'];
			$y = $_POST['mail'];
			$con = mysqli_connect("localhost","root","","online_exam_system");
			$sql ="Insert into reply(Mail,Text) Values('$y','$x')";
			$query = "DELETE FROM chat WHERE Mail='$y'";
			mysqli_query($con,$query);
			$res = mysqli_query($con,$sql);
			if(count($res) > 0)
			{
				echo '<script language="javascript">';
				echo 'alert("Successfully Inserted"); 
				location.href="Account.php"';
				echo '</script>';											
			}
		}
	}
?>