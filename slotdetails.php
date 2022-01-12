
<?php 
include 'baseurlconfig.php';
session_start();
include 'connection.php';


if($_SESSION['uname'] == "" || !isset($_SESSION['uname'])) 
{
   header("Location: ".$baseurl."login.php");
}

$uname=$_SESSION['uname'];

$sql = "SELECT slotbookinginformation.* , userinformation.* FROM slotbookinginformation , userinformation WHERE slotbookinginformation.UserName ='".$uname."' AND slotbookinginformation.UserName = userinformation.Uname";
$uid = mysqli_query($conn, $sql);
while($userid = mysqli_fetch_array($uid)) {	

 $fname=$userid["Fname"];
 $lname=$userid["Lname"];
 $dob=$userid["dob"];
 $mobile=$userid["Mobile"];
 $centre=$userid["BookingCentre"];
 $book_date=$userid["BookingDate"];
 $book_time=$userid["BookingTime"];


}
$age=date_diff(date_create($dob), date_create('today'))->y;

$_SESSION['uname']="";

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <link rel = "icon" href = "download.png" type = "image/x-icon">
 <link rel="stylesheet" type="text/css" href="vaccine.css">
 <title>Slot Details</title>
</head>
<body>
 <div class="body">
  <div class="header">
   <a style="text-decoration: none" href="<?php echo $baseurl; ?>index.php"><h1 class="nav_header">VACC&#128137;NE</h1></a>
   <div class="nav">
      <label class="nav_menu" onclick="location.href='https://dashboard.cowin.gov.in/'">Dashboard</label></a>
      <label class="nav_menu" onclick="location.href='<?php echo $baseurl; ?>registration.php'">Registration</label>
      <label class="nav_menu" onclick="location.href='<?php echo $baseurl; ?>logout.php'">|Log out</label>
   </div>
</div>
<div class="details">
   <img class="img_logo" src="download.png">
   <h2>Slot Booking Details for vaccination</h2><br>
   <table>
     <tr>
      <td><label>First Name:</label></td>
      <td><label><?php echo $fname; ?></label></td>
   </tr>
   <tr>
      <td><label>Last Name:</label></td>
      <td><label><?php echo $lname; ?></label></td>
   </tr>
   <tr>
      <td><label>Age:</label></td>
      <td><label><?php echo $age; ?></label></td>
   </tr>
   <tr>
      <td><label>Mobile Number:</label></td>
      <td><label><?php echo $mobile; ?></label></td>
   </tr>
   <tr>
      <td><label>Center for vaccination:</label></td>
      <td><label><?php echo $centre; ?></label></td>
   </tr>
   <tr>
      <td><label>Date of vaccination:</label></td>
      <td><label><?php echo $book_date; ?></label></td>
   </tr>
   <tr>
      <td><label>Time of vaccination:</label></td>
      <td><label><?php echo $book_time; ?></label></td>
   </tr>
</table>
</div>
<footer class="footer">© 2021 All Rights Reserved. Developed & Design by Rajesh Debnath</footer>
</div>
</body>
</html>