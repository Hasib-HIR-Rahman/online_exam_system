<?php
if(isset($_POST['back']))
{
	header("Location:index.php");
}
// include_once("core/user_service.php");
/*user_service.php starts*/
include_once("core/db.php");
function addUser($user){
    $query="INSERT INTO user(name,Mail,Password,Age,Gender) VALUES('$user[name]','$user[mail]','$user[pass]','$user[age]','$user[gender]')";
    return executeNonQuery($query);
}
function Result($user)
{
	$sql = "INSERT INTO result(User_Name,Marks) VALUES('$user[name]','0')";
	return executeNonQuery($sql);
}
/*core user data code ends*/
if(isset($_POST['back']))
{
	header("Location:index.php");
}
function addNewResult($name,$mail,$con,$pass,$age,$gender,$mark)
{
	$div = substr($mail,-4);
	$word = explode(" ", $name);
	if($div == ".com")
	{
		if(count($word) >= 2)
		{
			for($i=0;$i<strlen($name);$i++)
			{
				if((ord($name[$i])>=65 && ord($name[$i])<=90) || (ord($name[$i])>=97 && ord($name[$i])<=122) || ord($name[$i])== 32)
				{
					$nm = $name;
				}
				else
				{
					echo "Only letters";
					break;
				}
			}
			if($pass == $con)
			{
				$user=array("name"=>$name,"mark"=>$mark);
				return Result($user);
			}
		}
	}
}
function addNewUser($name,$mail,$con,$pass,$age,$gender)
{
	$div = substr($mail,-4);
	$word = explode(" ", $name);
	if($div == ".com")
	{
		if(count($word) >= 2)
		{
			for($i=0;$i<strlen($name);$i++)
			{
				if((ord($name[$i])>=65 && ord($name[$i])<=90) || (ord($name[$i])>=97 && ord($name[$i])<=122) || ord($name[$i])== 32)
				{
					$nm = $name;
				}
				else
				{
					echo "Only letters";
					break;
				}
			}
			if($pass == $con)
			{
				$user=array("name"=>$name,"mail"=>$mail,"pass"=>$pass,"age"=>$age,"gender"=>$gender);
				return addUser($user);
			}
			else 
				echo "Password Don't match";
		}
		else
			echo "Must be 2 word";
	}
	else
		echo "Invalid mail";

}
/*user_service.php ends*/

if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!isset($_POST['gender']))
	{
		echo "select  gender";
	}
	$mark = 0;
    $result=addNewUser($_POST['name'],$_POST['mail'],$_POST['pass'],$_POST['con'],$_POST['age'],$_POST['gender']);
	$new_user=addNewResult($_POST['name'],$_POST['mail'],$_POST['pass'],$_POST['con'],$_POST['age'],$_POST['gender'], $mark);
	if($result){
        echo '<script language="javascript">';
		echo 'alert("Successfully Registered"); 
		location.href="index.php"';
		echo '</script>';
    }
}
if(isset($_POST['back']))
{
	header("Location:index.php");
}
?>
<html>
	<head>
		<title>Registration</title>
		<link href="assets/css/Registration.css" rel="stylesheet" type="text/css" />
	</head>
	<body background="images/exam.jpg">
		<form  method="POST" onsubmit="return validation()">
			<div class="main">
				<div class="header">
					<h4>New User Registration</h4>
					<hr>
				</div>
				<div class="name">
					<h3>Name:</h3>
					<input type="text" id="name" name="name" placeholder="Enter your name">
				</div>
				<div class="mail">
					<h3>Email:</h3>
					<input type="text" id="mail" name="mail" placeholder="Enter your mail">
				</div>
				<div class="Age">
					<h3>Age:</h3>
					<input type="text" id="age" name="age" placeholder="Enter your age">
				</div>
				<div class="gender">
					<h3>Gender:
					<input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
				</div>
				<div class="Password">
					<h3>Password:</h3>
					<input type="password" id="pass" name="pass" placeholder="Enter your password">
				</div>
				<div class="Confirm">
					<h3>Confirm Password:</h3>
					<input type="password" id="con" name="con" placeholder="Enter your password again">
				</div>
				<div class="register">
					<hr>
					<input type="submit" value="Register" name="submit">
					<hr>
				</div>
		
			</div>
		</form>
		<script>
			function validation()
			{
				if(document.getElementById('name').value=="" || document.getElementById('mail').value==""||document.getElementById('age').value==""||document.getElementById('pass').value==""|| document.getElementById('con').value=="")
				{
					alert('name can not be empty');
					return false;
				}
			}
		</script>
	</body>
</html>
