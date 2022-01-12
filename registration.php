
<?php 
include 'baseurlconfig.php';
session_start();
include 'connection.php';

$alert="";
$setdate= date('Y-m-d',strtotime("-18 years"));
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // collect value of input field
  $username= $_POST['aadhar'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];
  $aadhar = $_POST['aadhar'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $address = $_POST['address'];



  $sql1 = "SELECT usercredentials.* , userinformation.Aadhar FROM usercredentials, userinformation WHERE Aadhar ='".$aadhar."' AND usercredentials.UserName = userinformation.Uname";
  $uid = mysqli_query($conn, $sql1);
  while($userid = mysqli_fetch_array($uid)) {

    echo "rajesh";
    $user_id = $userid["UserName"];
    $user_id1 = $userid["Password"];
  }



  if (!empty($user_id) && !empty($user_id1)) {

    $alert="This person has already registerd";

}

elseif(!empty($user_id) && empty($user_id1)){
 $_SESSION['username']=$username;
 $_SESSION['regalert']="Already registerd. Now You can only Set Username and Password";
 header("Location: ".$baseurl."setcredentials.php");
}  

else{
  $sql2 = "INSERT INTO usercredentials (UserName) VALUES ('".$username."')";
  if ($conn->query($sql2) === TRUE){


    $sql3 = "INSERT INTO userinformation (Uname, Fname, Lname, dob, Aadhar, Mobile,  Email, Address) VALUES ('".$username."', '".$fname."' , '".$lname."','".$dob."', '".$aadhar."', '".$mobile."', '".$email."', '".$address."')";
    if ($conn->query($sql3) === TRUE){ 

      $_SESSION['username']=$username;
      $_SESSION['regalert']="";
      header("Location: ".$baseurl."setcredentials.php");

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
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel = "icon" href = "download.png" type = "image/x-icon">
  <link rel="stylesheet" type="text/css" href="vaccine.css">
  <title>Registion</title>
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
      <img class="img_logo" src="download.png">
      <h2>Rgistration for vaccination</h2>
      <p class="alert"><u><b>*Note</b></u><br>• This vaccine is for 18 and above only.<br>• One person can book one vaccine slot.</p>
      <p class="alert"><?php echo $alert; ?></p>
      <form method="POST" action="" autocomplete="off">
        <table>
          <tr>
            <td><label for="fname">First Name:</label></td>
            <td><input type="text" name="fname" placeholder="Maximum 20 charecters" maxlength="20" required></td>
          </tr>
          <tr>

            <td><label for="lname">Last Name:</label></td>
            <td><input type="text" name="lname" placeholder="Maximum 20 charecters" maxlength="20" required>
            </td>
          </tr>
          <tr>
          <td><label for="dob">Date of Birth:</label></td>
          <td><input type="date" name="dob" max="<?php echo $setdate; ?>" required></td>
          </tr>
          <tr>
          <td><label for="aadhar">Aadhar Number:</label></td>
          <td><input type="text" name="aadhar" placeholder="Enter 12 digits Adahar Number" pattern="[0-9]{12}" required></td>
        </tr>
        <tr>
          <td><label for="mobile">Mobile:</label></td>
          <td><input type="text" name="mobile" placeholder="Enter 10 digits Mobile Number" pattern="[6789][0-9]{9}" required></td>
          </tr>
          <tr>
          <td><label for="email">Email Address:</label></td>
          <td><input type="email" name="email" placeholder="Maximum 30 charecters" required></td>
          </tr>
          <tr>
         <td><label for="address">Address:</label></td> 
          <td><input type="text" name="address" placeholder="Maximum 30 charecters" required></td>
          </tr>
        </table>
        <input type="submit" value="Register">

      </form>
      <br>
      <p class="link">Already have registered?<a href="<?php echo $baseurl; ?>login.php" class="a"><span> click here</span></a></p>
    </div>
    <footer class="footer">© 2021 All Rights Reserved. Developed & Design by Rajesh Debnath</footer>
  </div>
</body>
</html>