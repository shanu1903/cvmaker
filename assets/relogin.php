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
		session_start();
		include('database.php');	
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


		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$username=test_input($_POST['username']);
			$password=MD5(test_input($_POST['password']));
			$sql="SELECT username FROM signup WHERE username='$username' AND password='$password'";
			$result=$con->query($sql);
			$count_row=$result->num_rows;

			if($count_row==1)
			{   $_SESSION['login_user']=$username;
				header('location:welcome.php');
			}
			else
			{
				header('location:login_error.php');
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
				<div class="collapse navbar-collapse" id="mynav">
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="container-fluid" style="width: 100%; height: 100%;">
				<div class="jumbotron text-center" style="margin-top:70px;">
					<h1><span class="glyphicon glyphicon-thumbs-up" style="font-size: 160px;"></span></h1>
					<h1>THANKYOU FOR SIGNING UP</h1>
					<button class="btn btn-danger btn-lg"  data-toggle="modal" data-target="#logmodal" href="#">login again</button>
					<a href="../index.php" class="btn btn-danger btn-lg">Back</a>
				</div>
				<div class="modal fade" id="logmodal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<button class="close" data-dismiss="modal">&times</button>
						<div class="imcontainer">
							<img class="avatar" src="../image/avatar.png">
						</div>
						<form method="post">
							<div class="form-group">
								<label>USERNAME:</label>
								<input type="text" name="username"  class="form-control" required placeholder="Enter your email">
							</div>
							<div class="form-group">
								<label>PASSWORD:</label>
								<input type="password" name="password" class="form-control" required placeholder="Enter your password">
							</div>
							<div class="checkbox">
								<label><input type="checkbox" name="" class="checkbox">REMEMBER ME</label>
							</div>
							<button class="btn btn-primary btn-lg" type="submit">Log in</button>
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
	</body>
</html>