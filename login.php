<?php include 'baseurlconfig.php' ;
session_start();
 include 'connection.php';
$alert="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // collect value of input field
  $username= $_POST['username'];
  $password= $_POST['password'];

  $sql1 = "SELECT * FROM usercredentials WHERE UserName ='".$username."' AND Password='".$password."'";
  $uid = mysqli_query($conn, $sql1);
  while($userid = mysqli_fetch_array($uid)) {	

    $user_id = $userid["UserName"];
    $pass= $userid["Password"];

  }


    $sql2 = "SELECT * FROM slotbookinginformation WHERE UserName ='".$username."'";
  $uid1 = mysqli_query($conn, $sql2);
  while($userid1 = mysqli_fetch_array($uid1)) {	

    $user_id1 = $userid1["UserName"];

  }

  if (empty($user_id) || empty($pass)) {

    $alert='* Wrong Username or Password';
 }

elseif (!empty($user_id1)) {

   header("Location: ".$baseurl."slotdetails.php");
   $_SESSION['uname']=$user_id1;
}

 else{
 	$_SESSION['uname']=$user_id;

   header("Location: ".$baseurl."slotbooking.php");
 }
 
} 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel = "icon" href = "download.png" type = "image/x-icon">
  <link rel="stylesheet" type="text/css" href="vaccine.css">
	<title>Login</title>
</head>
<body>
  <div class="body">
    <div class="header">
      <a style="text-decoration: none" href="<?php echo $baseurl; ?>index.php"><h1 class="nav_header">VACC&#128137;NE</h1></a>
      <div class="nav">
      <label class="nav_menu" onclick="location.href='https://dashboard.cowin.gov.in/'">Dashboard</label></a>
      <label class="nav_menu" onclick="location.href='<?php echo $baseurl; ?>registration.php'">Registration</label>
      </div>
    </div>
    <div class="login">
      <img class="img_logo" src="download.png">
      <h2>Login for vaccination</h2>
      <p class="alert"><?php echo $alert; ?></p>
	<form method="POST" action="" autocomplete="off">
		<input type="text" name="username" placeholder="Enter Username" minlength="8" maxlength="20" required><br>
		<input type="password" name="password" placeholder="Enter Password" minlength="8" maxlength="20" required><br>
		<input type="submit" value="Login">
	</form>
  <br>
	<p class="link">new user?<a href="<?php echo $baseurl; ?>registration.php" class="a"><span> click here</span></a></p>
  </div>
  <footer class="footer">© 2021 All Rights Reserved. Developed & Design by Rajesh Debnath</footer>
  </div>
</body>
</html>