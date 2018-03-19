<?php
include('session.php');

$skill="";



function input_test($data)
{
	$data=htmlspecialchars($data);
	$data=stripslashes($data);
	$data=trim($data);
	return $data;

}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$skill=input_test($_POST['skill']);


	$result=$con->query("INSERT INTO `skill` (`id`, `username`, `skill`) VALUES (NULL, '$login_session', '$skill')");


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