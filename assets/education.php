<?php
include('session.php');

$edu="";
$school="";
$year="";



function input_test($data)
{
	$data=htmlspecialchars($data);
	$data=stripslashes($data);
	$data=trim($data);
	return $data;

}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$edu=input_test($_POST['edu']);
	$school=input_test($_POST['school']);
	$year=input_test($_POST['year']);
	$result=$con->query("INSERT INTO `education` (`id`, `username`, `education`, `school` ,`year`) VALUES (NULL, '$login_session', '$edu','$school','$year')");


	if($result)
	{
		header('location:welcome.php');
	}
	else
	{
		echo "error";
	}
}



?>