<!DOCTYPE html>
<html>
	<head>
		<title>CVmaker</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist\css\bootstrap.min.css">
		<script type="text/javascript" src="jquery/jquery-3.2.1.js"></script>
		<script type="text/javascript" src="bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="w3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php
		session_start();
		include('assets/database.php');	
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
				header('location:assets/welcome.php');
			}
			else
			{
				header('location:assets/login_error.php');
			}


		}
		?>
	</head>
	<body id="mypage" data-spy="scroll" data-target=".navbar" data-offset="70">
		<nav class="navbar navbar-default navbar-fixed-top w3-red">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">CVmaker</a>
				</div>
				<div class="collapse navbar-collapse" id="mynav">
					<ul class="nav navbar-nav">
						<li><a href="#about">ABOUT</a></li>
						<li><a href="#service">SERVICE</a></li>
						<li><a href="#theme">THEME</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">more<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a  href="#contact">CONTACT</a></li>
							<li><a href="">ADMIN</a></li>
							<li><a href="">section 1</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a  data-toggle="modal" data-target="#signmodal" href="#"><span class="glyphicon glyphicon-user"> sign up</span></a></li>
					<li><a  data-toggle="modal" data-target="#logmodal" href="#"><span class="glyphicon glyphicon-log-in"> log in</span></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="modal fade" id="logmodal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<button class="close" data-dismiss="modal">&times</button>
				<div class="imcontainer">
					<img class="avatar" src="image/avatar.png">
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

				<div><h1 style="color: red"><?php echo $error;?></h1></div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="signmodal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<button class="close" data-dismiss="modal">&times</button>
				<div class="imcontainer">
					<div class="jumbotron text-center">
						<h1>Sign up</h1>
					</div>
				</div>
				<form method="post" action="assets/signup.php">
					<div class="form-group">
						<label>NAME:</label>
						<input type="text" name="name"  class="form-control" required placeholder="Enter your name">
					</div>
					<div class="form-group">
						<label>USERNAME:</label>
						<input type="text" name="signuser"  class="form-control" required placeholder="Enter your email">
					</div>
					<div class="form-group">
						<label>PASSWORD:</label>
						<input type="password" name="signpass" class="form-control" required placeholder="Enter your password">
					</div>
					<button class="btn btn-primary btn-lg" name="submit" type="submit">Sign up</button>
				</form>
			</div>
		</div>
	</div>
	<div class="jumbotron text-center">
		<h1><img style="width: 260px" src="image/logo.png">Maker</h1>
		<p>We specialize in making CV</p>
		
		<button data-toggle="modal" data-target="#logmodal" type="button" class="btn btn-danger btn-lg">log in</button>
		<button data-toggle="modal" data-target="#signmodal" type="button" class="btn btn-danger btn-lg">Sign up</button>
	</div>
	<div class="container-fluid" id="about">
		<h1 class="text-center">ABOUT</h1>
		<br><br>
		<div class="row">
			<div class="col-sm-8">
				<p>Study shows that recruiters take just 6 seconds to make the initial 'Yes/No' decision based on your resume.
					A well made resume that prioritizes the right information helps you get past the initial screening. During the interview, it presents you as an organized and thoughtful individual with an eye for detail.
				It multiplies your chances of landing your dream job.</p>
			</div>
			<div class="col-sm-4">
				<span class=" glyphicon glyphicon-user logo"></span>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-grey text-center" id="service">
		<h1>SERVICE</h1>
		<br>
		<h3>WHAT WE OFFER</h3>
		<br>
		<br>
		<div class="row slideanim">
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-off logo-mini"></span>
				<h3>POWER</h3>
				<p>Create resume effortlessly</p>
				<br>
			</div>
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-print logo-mini"></span>
				<h3>PRINT</h3>
				<p>print cv easily</p>
				<br>
			</div>
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-floppy-save logo-mini"></span>
				<h3>SAVE</h3>
				<p>save your details</p>
				<br>
			</div>
		</div>
	</div>
	<div class="container-fluid text-center" id="theme">
		<h1>THEME</h1>
		<br>
		<h3>What we have created so far</h3>
		<br>
		<div class="row text-center slideanim">
			<div class="col-sm-6">
				<div class="thumbnail">
					<img src="image/print.png" alt="for print">
					<br>
					<strong>FOR PRINT</strong>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="thumbnail">
					<img src="image/host.png" alt="for host">
					<br>
					<strong>FOR HOSTING</strong>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-grey" id="contact">
		<h1 class="text-center">CONTACT</h1>
		<br>
		<div class="row">
			<div class="col-sm-5">
				<p>Contact us and we'll get back to you within 24 hours.</p>
				<p><span class="glyphicon glyphicon-map-marker"></span> pinto park</p>
				<p><span class="glyphicon glyphicon-phone"></span> +91 8882861570</p>
				<p><span class="glyphicon glyphicon-envelope"></span> ssshailesh3@gmal.com</p>
			</div>
			<div class="col-sm-7 slideanim">
				<div class="row">
					<div class="col-sm-6 form-group">
						<input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
					</div>
					<div class="col-sm-6 form-group">
						<input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
					</div>
				</div>
				<textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
				<div class="row">
					<div class="col-sm-12 form-group">
						<button class="btn btn-default pull-right" type="submit">Send</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="text-center">
		<a href="#mypage"><span class="glyphicon glyphicon-chevron-up"></span></a>
		<p>to top</p>
	</footer>

<script>
	//script for smooth scrolling effect
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== ""){
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>
<script>
	//script for slide in effect
	$(window).scroll(function() {
  $(".slideanim").each(function(){
    var pos = $(this).offset().top;

    var winTop = $(window).scrollTop();
    if (pos < winTop + 600) {
      $(this).addClass("slide");
    }
  });
});
</script>
</body>
</html>