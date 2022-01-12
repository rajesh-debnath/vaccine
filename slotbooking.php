<?php 
include 'baseurlconfig.php';
session_start();
include 'connection.php';

if($_SESSION['uname'] == "" || !isset($_SESSION['uname'])) 
{  
  header("Location: ".$baseurl."login.php");
}

$setdate= date('Y-m-d',strtotime("+1 day"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // collect value of input field
  $centre= $_POST['centre'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $username = $_SESSION['uname'];
  $bookingid = $username.date("Ymd");


  $sql2 = "INSERT INTO slotbookinginformation (UserName, BookingId, BookingCentre, BookingDate, BookingTime) VALUES ('".$username."', '".$bookingid."' , '".$centre."','".$date."', '".$time."')";
  if ($conn->query($sql2) === TRUE){

    header("Location: ".$baseurl."slotdetails.php");
  }
  else {
    echo  "Error: " . mysqli_error($conn);
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel = "icon" href = "download.png" type = "image/x-icon">
  <link rel="stylesheet" type="text/css" href="vaccine.css">
  <script type="text/javascript" src="vaccine.js"></script>
  <title>Slot Booking</title>
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
    <div class="reg">
      <img class="img_logo" src="download.png">
      <h2>Slot Booking for vaccination</h2>
      <p id="alert" class="alert"></p>
      <form method="POST" action="" autocomplete="off">
        <table>
          <tr>
            <td><label for="fname">Choose Center:</label></td>
            <td>

              <select name="centre" id="centre">
                <option value="--select vaccine centre--">--select vaccine centre--</option>
                <option value="Alipurduar">Alipurduar</option>
                <option value="Bankura">Bankura</option>
                <option value="Birbhum">Birbhum</option>
                <option value="Cooch Behar">Cooch Behar</option>
                <option value="Dakshin Dinajpur">Dakshin Dinajpur</option>
                <option value="Darjeeling">Darjeeling</option>
                <option value="Hooghly">Hooghly</option>
                <option value="Howrah">Howrah</option>
                <option value="Jalpaiguri">Jalpaiguri</option>
                <option value="Jhargram">Jhargram</option>
                <option value="Kalimpong">Kalimpong</option>
                <option value="Kolkata">Kolkata</option>
                <option value="Malda">Malda</option>
                <option value="Murshidabad">Murshidabad</option>
                <option value="Nadia">Nadia</option>
                <option value="North 24 Parganas">North 24 Parganas</option>
                <option value="Paschim Medinipur">Paschim Medinipur</option>
                <option value="Paschim Bardhaman">Paschim Bardhaman</option>
                <option value="Purba Bardhaman">Purba Bardhaman</option>
                <option value="Purba Medinipur">Purba Medinipur</option>
                <option value="Purulia">Purulia</option>
                <option value="South 24 Parganas">South 24 Parganas</option>
                <option value="Uttar Dinajpur">Uttar Dinajpur</option>
              </select>

            </td>
          </tr>
          <tr>

            <td><label for="lname">Choose Date:</label></td>
            <td><input type="date" id="setdate" name="date" min="<?php echo $setdate; ?>" required></td>
          </tr>
          <tr>
            <td><label for="dob">Choose Time Slot:</label></td>
            <td>


              <select name="time" id="time">
                <option value="--select time--">--select time--</option>
                <option value="10am - 12pm">10:00am - 12:00pm</option>
                <option value="12pm - 2pm">12:00pm - 2:00pm</option>
                <option value="2pm - 4pm">2:00pm - 4:00pm</option>
              </select>


            </td>
          </tr>

        </table>
        <input type="button" value="Slot Book" id="btn" onclick="check()">

      </form>
    </div>
    <footer class="footer">© 2021 All Rights Reserved. Developed & Design by Rajesh Debnath</footer>
  </div>
</body>
</html>