<?php
include_once("lib/db.php");
function addUser($user){
    $query="INSERT INTO user(name,Mail,Password,Age,Gender) VALUES('$user[name]','$user[mail]','$user[pass]','$user[age]','$user[gender]')";
    return executeNonQuery($query);
}
function Result($user)
{
	$sql = "INSERT INTO result(User_Name,Marks) VALUES('$user[name]','0')";
	return executeNonQuery($sql);
}
?>
