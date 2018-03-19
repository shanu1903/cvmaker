<?php
include('session.php');


$time="";
$job="";
$job_des="";



function input_test($data)
{
	$data=htmlspecialchars($data);
	$data=stripslashes($data);
	$data=trim($data);
	return $data;

}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$time=input_test($_POST['time']);
	$job=input_test($_POST['job']);
	$job_des=input_test($_POST['job_des']);
	$result=$con->query("INSERT INTO `work` (`id`, `username`, `time_period`, `job` ,`about`) VALUES (NULL, '$login_session', '$time','$job','$job_des')");


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