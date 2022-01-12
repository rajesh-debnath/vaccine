<?php 
include 'baseurlconfig.php';
session_start();
include 'connection.php';

$alert="";
$regalert="";
if($_SESSION['username'] == "" || !isset($_SESSION['username'])) 
       {

         header("Location:".$baseurl."login.php");
       }




if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // collect value of input field
  $username= $_POST['uname'];
  $password = $_POST['pass'];
  

$sql1 = "SELECT  Uname FROM userinformation WHERE Uname ='".$username."'";
$uid = mysqli_query($conn, $sql1);
while($userid = mysqli_fetch_array($uid)) { 

$user_id = $userid["UserName"];

}


  if (!empty($user_id)) {

 $alert="This Username is Already taken"."<br>"."Please try Unique Username";
  } 

else{
$sql2 = "UPDATE usercredentials SET UserName='".$username."', Password='".$password."' WHERE UserName='".$_SESSION['username']."'";
 
 if ($conn->query($sql2) === TRUE){



$sql3 = "UPDATE userinformation SET Uname='".$username."' WHERE Uname='".$_SESSION['username']."'"; 
if ($conn->query($sql3) === TRUE){ 
    $_SESSION['username'] = "";
   header("Location: ".$baseurl."login.php");

} 
  else {
    echo  "Error: " . mysqli_error($conn);
  }


} 
  else {
    echo  "Error: " . mysqli_error($conn);
  }
}
}
if(!empty($_SESSION['regalert'])){
 $regalert=$_SESSION['regalert'];
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel = "icon" href = "download.png" type = "image/x-icon">
  <link rel="stylesheet" type="text/css" href="vaccine.css">
  <script type="text/javascript" src="vaccine.js"></script>
  <title>Set Credential</title>
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
      <h3>Set Login Username and Password for vaccination</h3>
      <p class="alert"><?php echo $alert; ?></p>
      <p class="alert"><?php echo $regalert; ?></p>
  <form method="POST" action="" autocomplete="off">
    <input type="text" name="uname" placeholder="Set Username (min: 8 and max: 20 Charecters)" minlength="8" maxlength="20" required>
    <input type="password" name="pass" id="pass" placeholder="Set Password" onkeyup ="checking()" required>
    <input type="button" id="check" value="Submit">
  </form>
  <br>
  <p class="link">already have registered?<a href="<?php echo $baseurl; ?>login.php" class="a"><span> click here</span></a></p>
  </div>
  <div class="matching">
    <h4>Password should be at least :</h4>
    <li id="1st">Minimum 8 charecters and Maximum 20 charecters</li>
    <li id="2nd">One capital letter</li>
    <li id="3rd">One special characters like $, %, @, !, &, *</li>
    <li id="4th">one digit.</li>
  </div>
  <footer class="footer">© 2021 All Rights Reserved. Developed & Design by Rajesh Debnath</footer>
  </div>
</body>
</html>