<!doctype html>
<html>
<head>
  <title>Driver Management - Add Driver Confirmation</title>
</head>
<body>
  <?php
  $uname = "";
  $pass = "";
  $manID;
  $fname = "";
  $lname = "";
  $email = "";
  $dob = "";
  $salary;
  $sDate = "";
  $result;

  if(isset($_POST["username"])) $uname=$_POST["username"];
  if(isset($_POST["password"])) $pass=$_POST["password"];
  if(isset($_POST["managerID"])) $manID=$_POST["managerID"];
  if(isset($_POST["firstname"])) $fname=$_POST["firstname"];
  if(isset($_POST["lastname"])) $lname=$_POST["lastname"];
  if(isset($_POST["email"])) $email=$_POST["email"];
  if(isset($_POST["dateofbirth"])) $dob=$_POST["dateofbirth"];
  if(isset($_POST["salary"])) $salary=$_POST["salary"];
  if(isset($_POST["startDate"])) $sDate=$_POST["startDate"];
?>


<?php
  require_once("truckingDB.php");
   $sql = "insert into driver(managerID, driverUsername, driverPassword, employmentStatus,
   driverFirstName, driverLastName, driverEmail, driverDOB, driverSalary, totalMilesDriven,
   hireDate, resignDate, daysEmployed, totalDaysFromHome) values($manID,'$uname','$pass','active','$fname','$lname','$email','$dob','$salary',0, '$sDate', 'NULL',0,0)";

  $result=$mydb->query($sql);
  if ($result==1) {
    echo "<p>A new Driver has been created!</p>";
  }
  else {
    echo "<p>New Driver failed to be created</p>";
  }
?>
<!-- Todo -->
<input type="button" class="button" onClick="location.href='Home.html'" value="Home">
</body>
</html>
