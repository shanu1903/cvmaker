<!DOCTYPE html>
<html>
<title>CVmaker theme 2</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    include('../../assets/session.php');
    $result_user=$con->query("SELECT * FROM user WHERE username='$login_session'");
    $result_skill=$con->query("SELECT * FROM skill WHERE username='$login_session'");
    $result_edu=$con->query("SELECT * FROM education WHERE username='$login_session'");
    $result_work=$con->query("SELECT * FROM work WHERE username='$login_session'");
    $row_user=$result_user->fetch_assoc();


  ?>
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container w3-center">
          <img src="../../image/avatar.png"  style="width:50%" alt="Avatar">
          <br>
          <br>
           <br>
          <br>
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo strtoupper($row_user['name']);?></h2>
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $row_user['cur_job'];?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $row_user['address'];?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $row_user['email'];?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $row_user['mobile'];?></p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>

          <?php while($row_skill=$result_skill->fetch_assoc()):?>
          <p><?php echo $row_skill['skill'];?></p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:100%">.....</div>
          </div>
        <?php endwhile;?>
          <br>

          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
        <?php while($row_work=$result_work->fetch_assoc()):?>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $row_work['job'];?></b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row_work['time_period'];?></h6>
          <p><?php echo $row_work['about'];?></p>
          <hr>
        </div>
      <?php endwhile;?>
      </div>


      <!--education-->

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <?php while ($row_edu=$result_edu->fetch_assoc()):?>
        <div class="w3-container">
          <h5 class="w3-opacity"><b><?php echo $row_edu['school'];?></b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i><?php echo $row_edu['year'];?></h6>
          <p><?php echo $row_edu['education'];?></p>
          <hr>
        </div>

        <?php endwhile;?>
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find me on social media.</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>Powered by.......</p>
</footer>

</body>
</html>
