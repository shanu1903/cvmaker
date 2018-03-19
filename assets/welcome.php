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
	<div class="container-fluid" style="margin-top: 40px;">
		<center>
		<div class="thumbnail " style="width: 140px;height: 140px";>
			<img src="../image/avatar.png">
		</div>
		</center>
	</div>
	
	<div class="container-fluid ">
		<div class="row" >
			<div class="col-md-6 bg-grey" style="height: 165px; border:1px solid black">
				<h5><label>NAME:</label> <?php echo strtoupper($row_ses['name']);?></h5>
				<h5><label>EMAIL:</label> <?php echo $row_ses['email'];?></h5>
				<h5><label>MOBILE:</label> <?php echo $row_ses['mobile'];?></h5>
				<h5><label>ADDRESS:</label> <?php echo $row_ses['address'];?></h5>
			</div>
			<div class="col-md-6 bg-grey" style="height: 165px; border:1px solid black">
				<h5><label>POSITION:</label> <?php echo $row_ses['cur_job'];?></h5>
				<h5><label>ABOUT:</label> <?php echo $row_ses['job_des'];?></h5>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<center><h3>SKILLS</h3></center>
				<button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myskill">ADD</button>
				<div class="modal fade" id="myskill">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" data-dismiss="modal">&times</button>
								<h2 class="modal-heading">ADD SKILL</h2>
							</div>
							<div class="modal-body">
								<form action="skill.php" method="post">
									<div class="form-group">
										<label>YOUR SKILL:</label>
										<input type="text" name="skill" class="form-control" required placeholder="Enter SKILL">
									</div>
									<button type="Submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<table class="w3-table w3-table-all w3-hoverable">
					<thead>
						<tr>
							<th>S.NO</th>
							<th>SKILL</th>
							<th>OPTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$result_skill=$con->query("SELECT * FROM skill WHERE username='$login_session'");
							$x=NULL;
							while($row_skill=$result_skill->fetch_assoc()):
						?>
						<tr>
							<td class="col-md-4"><?php echo ++$x;?></td>
							<td class="col-md-4"><?php echo $row_skill['skill'];?></td>
							<td><a class="btn btn-success" href="">edit</a> <a class="btn btn-danger" href="delete_skill.php?id=<?php echo $row_skill['id'];?>">delete</a></td>
						</tr>
						<?php  endwhile ;?>
					</tbody>
				</table>
			</div>
			<div class="col-md-7">
				<center><h3>QUALIFICATION</h3></center>
				<button class="btn btn-warning pull-right" data-toggle="modal" data-target="#myedu">ADD</button>
				
				<div class="modal fade" id="myedu">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" data-dismiss="modal">&times</button>
								<h2 class="modal-heading">ADD QUALIFICATION</h2>
							</div>
							<div class="modal-body">
								<form action="education.php" method="post">
									<div class="form-group">
										<label>QUALIFICATION:</label>
										<input type="text" name="edu" class="form-control" required placeholder="Enter your qualification">
									</div>
									<div class="form-group">
										<label>SCHOOL/COLLAGE:</label>
										<input type="text" name="school" class="form-control" required placeholder="Enter school/collage name">
									</div>
									<div class="form-group">
										<label>YEAR:</label>
										<input type="text" name="year" class="form-control" required placeholder="Enter year">
									</div>
									
									<button class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<br><br>
				<table class="w3-table w3-table-all w3-hoverable">
					<thead>
						<tr>
							<th class="col-md-1">QULI</th>
							<th class="col-md-1">WENT AT</th>
							<th class="col-md-1">YEAR</th>
							<th class="col-md-1">OPTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$result_edu=$con->query("SELECT * FROM education WHERE username='$login_session'");
							$x=NULL;
							while($row_edu=$result_edu->fetch_assoc()):
						?>
						<tr>
							<td><?php echo $row_edu['education'];?></td>
							<td><?php echo $row_edu['school'];?></td>
							<td><?php echo $row_edu['year'];?></td>
							<td><a class="btn btn-success" href="update_edu.php?id=<?php  echo $row_edu['id'];?>">edit</a> <a class="btn btn-danger" href="delete_edu.php?id=<?php  echo $row_edu['id'];?>">delete</a></td>
						</tr>
						<?php  endwhile ;?>
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row" style="margin-top: 78px;">
			<div class="col-md-10 col-md-offset-1">
				<center><h3>WORK EXPERIENCE</h3></center>
				<button class="btn btn-warning pull-right" data-toggle="modal" data-target="#mywork">ADD</button>
				<br><br>
				<div class="modal fade" id="mywork">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button class="close" data-dismiss="modal">&times</button>
								<h2 class="modal-heading">ADD WORK EXPERIENCE</h2>
							</div>
							<div class="modal-body">
								<form action="work.php" method="post">
									<div class="form-group">
										<label>TIME PERIOD:</label>
										<input type="text" name="time" class="form-control" required placeholder="FROM-TILL">
									</div>
									<div class="form-group">
										<label>JOB</label>
										<input type="text" name="job" class="form-control" required placeholder="Enter your position">
									</div>
									<div class="form-group">
										<label>DESCRIPTION:</label>
										<input type="text" name="job_des" class="form-control" required placeholder="Description">
									</div>
									
									<button class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--modal______________________________________________________-->
				<!--table____________________________________________________________-->
				<table class="w3-table w3-table-all w3-hoverable">
					<thead>
						<tr>
							<th class="col-md-2">PERIOD</th>
							<th class="col-md-2">JOB</th>
							<th class="col-md-3">ABOUT</th>
							<th class="col-md-1">OPTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$result_work=$con->query("SELECT * FROM work WHERE username='$login_session'");
						$x=NULL;
						while($row_work=$result_work->fetch_assoc()):
						?>
						<tr>
							<td class="col-md-1"><?php echo $row_work['time_period'];?></td>
							<td><?php echo $row_work['job'];?></td>
							<td><?php echo $row_work['about'];?></td>
							<td class="col-md-2"><a class="btn btn-success" href="update_work.php?id=<?php echo $row_work['id'];?>">edit</a> <a class="btn btn-danger" href="delete_work.php?id=<?php echo $row_work['id'];?>">delete</a></td>
						</tr>
						<?php  endwhile ;?>
					</tbody>
				</table>
				
			</div>
		</div>
		<br><br>
	</div>
	<div class="container-fluid text-center" id="theme">
		<h1> SELECT THEME</h1>
		<br>
		<div class="row text-center" style="padding: 50px;">
			<div class="col-sm-6">
				<div class="thumbnail">
					<img src="../image/print.png" alt="for print" style="padding: 50px;">
					<br>
					<strong><a class="btn btn-default" href="../theme/theme1/theme1.php">select</a></strong>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="thumbnail">
					<img src="../image/host.png" alt="for host" style="padding: 50px;">
					<br>
					<strong><a class="btn btn-default" href="../theme/theme2/theme2.php"">select</a></strong>
				</div>
			</div>
		</div>
	</body>
	<footer class="w3-red">
		<h6 class="text-center">Power by .......</h6>
	</footer>
</html>