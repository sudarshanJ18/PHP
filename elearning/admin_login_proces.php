<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username=="admin" && $password=="Lpuadmin@123")
{
	$_SESSION['admin_session'] = $username;
	header('location:user_list.php');
}
else
{
	header('location:adminlogin.php');
} 

?>