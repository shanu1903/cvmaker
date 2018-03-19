<!DOCTYPE html>
<html>
	<head>
		<title>CVmaker</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist\css\bootstrap.min.css">
		<script type="text/javascript" src="../jquery/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="../bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../w3.css">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<?php
			include('session.php');
			$id=$_GET['id'];
			$result=$con->query("SELECT * FROM work WHERE id='$id'");
			$row=$result->fetch_assoc();

			function input_test($data)
{
	$data=htmlspecialchars($data);
	$data=stripslashes($data);
	$data=trim($data);
	return $data;

}
			if(isset($_POST['send']))
			{
				$time=input_test($_POST['time']);
		        $job=input_test($_POST['job']);
				$job_des=input_test($_POST['about']);
		         $result=$con->query("UPDATE `work` SET `time_period` = '$time', `job` = '$job', `about` = '$job_des' WHERE `id` = '$id'");
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
							<li><a href="edit.php">edit</a></li>
							<li><a href="logout.php">logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container bg-grey" style="margin-top: 70px;">
		<form method="post">

			<h1>EDIT</h1>
			<div class="form-group">
				<label>PERIOD:</label>
				<input type="text" name="time" class="form-control" required placeholder="Form-till" value="<?php echo $row['time_period'];?>">
			</div>
			<div class="form-group">
				<label>JOB:</label>
				<input type="text" name="job" class="form-control" required placeholder="Work at" value="<?php echo $row['job'];?>">
			</div>
			<div class="form-group">
				<label>ABOUT:</label>
				<input type="text" name="about" class="form-control" required placeholder="About job" value="<?php echo $row['about'];?>">
			</div>
			
			<button class="btn btn-primary" name="send">Submit</button>
			<a class="btn btn-default" href="welcome.php">back</a>
		</form>
		<br>
	</div>
</body>
</html>