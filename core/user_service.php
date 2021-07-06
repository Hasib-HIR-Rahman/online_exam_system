<?php
//include_once('online-exam-system/app/view/core/user_data_access.php');
/*Core user data code starts*/
include_once("db.php");
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
?>