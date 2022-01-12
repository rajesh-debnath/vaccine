
<?php include 'baseurlconfig.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel = "icon" href = "download.png" type = "image/x-icon">
	<link rel="stylesheet" type="text/css" href="vaccine.css">
	<title>Home</title>
</head>
<body>
	<div class="body">
		<div class="header">
			<a style="text-decoration: none" href="<?php echo $baseurl; ?>index.php"><h1 class="nav_header">VACC&#128137;NE</h1></a>
			<div class="nav">
				<label class="nav_menu" onclick="location.href='https://dashboard.cowin.gov.in/'">Dashboard</label></a>
				<label class="nav_menu" onclick="location.href='<?php echo $baseurl; ?>login.php'">Login</label>
			</div>
		</div>
		<div class="reg">
			<img class="img_logo" src="download.png"><br>
			<h2>Book your vaccine now!!!</h2><br>
			<center><a href="<?php echo $baseurl; ?>registration.php"><input type="submit" value="Book"></a></center>

			

		</div>
		<footer style="margin-top: 250px;" class="footer">© 2021 All Rights Reserved. Developed & Design by Rajesh Debnath</footer>
	</div>
</body>
</html>