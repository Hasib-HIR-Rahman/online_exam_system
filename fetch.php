<?php
if(isset($_POST['id']))
{
	$x = $_POST['id'];
	$con = mysqli_connect("localhost","root","","online_exam_system");
	$sql = "SELECT * FROM test WHERE Id = '$x'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result))
	{
		$data['Question'] = $row['Question'];
		$data['Option1'] = $row['Option1'];
		$data['Option2'] = $row['Option2'];
		$data['Option3'] = $row['Option3'];
		$data['Option4'] = $row['Option4'];
		$data['Answer'] = $row['Answer'];
	}
	echo json_encode($data);
	mysqli_close($con);
}
?>