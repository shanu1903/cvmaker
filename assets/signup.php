<!DOCTYPE html>
<html>
<head>
	<title>CVMAKER</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist\css\bootstrap.min.css">
		<script type="text/javascript" src="../jquery/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="../bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../w3.css">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<?php 
			include('database.php');
			$name="";
			$username="";
			$password="";
			$error="";


			function test_input($data)
			{
				$data=htmlspecialchars($data);
				$data=stripslashes($data);
				$data=trim($data);

				return $data;
			}

			if(isset($_POST['submit']))
			{
				$name=test_input($_POST['name']);
				$username=test_input($_POST['signuser']);
				$password=MD5(test_input($_POST['signpass']));


				$sql1="INSERT INTO signup (username,password) VALUES('$username','$password') ";
				$sql2="INSERT INTO user (username,name) VALUES ('$username','$name')";

				$result1=$con->query($sql1);
				

				if($result1)
	   			{
	   				$result2=$con->query($sql2);
					header('location:relogin.php');
				}
				else
				{
					$error="USERNAME HAS ALREADY BEEN TAKEN";
				}

			}

		 ?>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top w3-red">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../index.php">CVmaker</a>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="container-fluid" style="width: 100%; height: 100%;">
			<div class="jumbotron text-center" style="margin-top:50px;">
				<h1><span class="glyphicon glyphicon-exclamation-sign" style="font-size: 160px;"></span></h1>
				<h1><?php echo $error;?></h1>
				<a href="../index.php" class="btn btn-danger btn-lg">BACK</a>
			</div>
		</div>
	</div>
</body>
</html>