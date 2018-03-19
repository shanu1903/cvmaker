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
			include('session.php');
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$name="";
				$email="";
				$address="";
				$mobile="";
				$postion="";
				$job_des="";


				function input_test($data)
				{
					$data=htmlspecialchars($data);
					$data=stripslashes($data);
					$data=trim($data);
					return $data;
				}

				$name=input_test($_POST['name']);
				$email=input_test($_POST['email']);
				$address=input_test($_POST['address']);
				$mobile=input_test($_POST['mobile']);
				$postion=input_test($_POST['position']);
				$job_des=input_test($_POST['job_des']);

				$result=$con->query("UPDATE `user` SET `name`='$name',`address`='$address',`email`='$email',`mobile`='$mobile',`cur_job`='$postion',`job_des`='$job_des' WHERE username='$login_session'");

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
					<a href="#" class="navbar-brand">CVMAKER</a>
				</div>
				<div class="collapse navbar-collapse" id="mynav">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="">WELCOME</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href=""><?php echo $row_ses['name'];?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="logout.php">logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="container bg-grey" style="margin-top: 40px;">
		<form method="post">
			<div class="form-group">
				<label>NAME:</label>
				<input type="text" name="name" value="<?php echo $row_ses['name'];?>" class="form-control">
			</div>
			<div class="form-group">
				<label>EMAIL:</label>
				<input type="text" name="email" value="<?php echo $row_ses['email'];?>" class="form-control">
			</div>
			<div class="form-group">
				<label>ADDRESS:</label>
				<input type="text" name="address" value="<?php echo $row_ses['address'];?>" class="form-control">
			</div>
			<div class="form-group">
				<label>MOBILE:</label>
				<input type="text" name="mobile" value="<?php echo $row_ses['mobile'];?>" class="form-control">
			</div>
			<div class="form-group">
				<label>POSITION:</label>
				<input type="text" name="position" value="<?php echo $row_ses['cur_job'];?>" class="form-control">
			</div>
			<div class="form-group">
				<label>JOB DISCRIPTION:</label>
				<input type="text" name="job_des" value="<?php echo $row_ses['job_des'];?>" rows="3" class="form-control">
			</div>

			<button class="btn btn-danger" type="submit">submit</button>
			<a class="btn btn-warning" href="welcome.php">back</a>
		</form>
		<br>
		<br>
	</div>
</body>
</html>