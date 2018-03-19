<!DOCTYPE html>
<html>
<head>
<title>CVmaker theme 1</title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 

<link type="text/css" rel="stylesheet" href="style.css">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

	<?php
		include('../../assets/session.php');
		$result_user=$con->query("SELECT * FROM user WHERE username='$login_session'");
		$result_skill=$con->query("SELECT * FROM skill WHERE username='$login_session'");
		$result_edu=$con->query("SELECT * FROM education WHERE username='$login_session'");
		$result_work=$con->query("SELECT * FROM work WHERE username='$login_session'");
		$row_user=$result_user->fetch_assoc();


	?>
</head>
<body id="top">
<div id="cv" class="instaFade">
	<div class="mainDetails">
		<div id="headshot" class="quickFade">
			<img src="headshot.jpg" alt="Alan Smith" />
		</div>
		
		<div id="name">
			<h1 class="quickFade delayTwo"><?php echo strtoupper($row_user['name']);?></h1>
			<h2 class="quickFade delayThree"><?php echo $row_user['cur_job'];?></h2>
		</div>
		
		<div id="contactDetails" class="quickFade delayFour">
			<ul>
				<li>e: <a href="#" target="_blank"><?php echo $row_user['email'];?></a></li>
				<li>a: <a href=""><?php echo $row_user['address'];?></a></li>
				<li>m: <?php echo $row_user['mobile'];?></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive">
		<section>
			<article>
				<div class="sectionTitle">
					<h1>ABOUT MYSELF</h1>
				</div>
				
				<div class="sectionContent">
					<p><?php echo $row_user['job_des']?></p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h1>Work Experience</h1>
			</div>
			
			<div class="sectionContent">


				<?php while($row_work=$result_work->fetch_assoc()):?>
				<article>
					<h2><?php echo $row_work['job'];?></h2>
					<p class="subDetails"><?php echo $row_work['time_period'];?></p>
					<p><?php echo $row_work['about'];?></p>
				</article>
			<?php endwhile;?>
			</div>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h1>Key Skills</h1>
			</div>
			
			<div class="sectionContent">
				<ul class="keySkills">

					<?php while($row_skill=$result_skill->fetch_assoc()):?>
					<li><?php echo $row_skill['skill'];?></li>
				<?php endwhile;?>
				</ul>
			</div>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h1>Education</h1>
			</div>
			
			<div class="sectionContent">
				<?php while ($row_edu=$result_edu->fetch_assoc()):?>
				<article>
					<h2><?php echo $row_edu['school'];?></h2>
					<p class="subDetails"><?php echo $row_edu['education'];?></p>
					<p><?php echo $row_edu['year'];?></p>
				</article>
				<?php endwhile;?>
			</div>
			<div class="clear"></div>
		</section>
		
	</div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3753241-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>