<?php
$DB_SERVER="localhost";
$DB_USER="root";
$DB_PASS="";
$DB_NAME="cvmaker";

$con=new mysqli($DB_SERVER,$DB_USER,$DB_PASS,$DB_NAME);


if($con->connect_error)
{
	echo "Connection failed=".$con->connect_error;
}
else
{
	echo "done";
}
?>