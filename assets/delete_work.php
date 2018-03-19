<?php
include('session.php');


$id=$_GET['id'];

$result=$con->query("DELETE FROM work WHERE id='$id'");
if($result)
{
	header('location:welcome.php');
}
else
{
	echo "error";
}

?>