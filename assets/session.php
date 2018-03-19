<?php
session_start(); 
include('database.php');
$user_check=$_SESSION['login_user'];
$ses_sql="SELECT * from user WHERE username='$user_check'";
$result_ses=$con->query($ses_sql);

$row_ses=$result_ses->fetch_assoc();
$login_session=$row_ses['username'];
if(!isset($_SESSION['login_user']))
{
	header('location:../index.php');
}
 ?>