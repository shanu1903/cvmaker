<!DOCTYPE html>
<html>
	<head>
		<title>test  form</title>
		<?php
			$user="";
			$email=" ";
			if(isset($_POST['submit']))
			{
				$user=$_POST["name"];
				$email=$_POST["email"];
			}
		?>
	</head>
	<body>
		<form method="post">
			<label>NAME:</label>
			<input type="text" name="name">
			<p><?php  echo $user;?></p>
			<br>
			<label>EMAIL:</label>
			<input type="text" name="email">
			<input type="submit" name="submit" value="ok">
			<?php echo $email;?>
		</form>
	</body>
</html>