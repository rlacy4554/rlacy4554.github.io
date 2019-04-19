<?php
session_start();
$fname = "";
$lname = "";
$email = "";
$err = false;

if (isset($_POST["submit"]))
{
  if(isset($_POST["firstname"])) $fname=$_POST["firstname"];
  if(isset($_POST["lastname"])) $lname=$_POST["lastname"];
  if(isset($_POST["email"])) $email=$_POST["email"];

  if (empty($fname) && empty($lname) && empty($email) {
    $err = true;
  }
  else {
    $sql= "update driver set";

    if (!empty($fname)){
      $sql += " driverFirstName = '$fname'";
    }

    if ($cont && !empty($lname)) {
      $sql += ", driverLastName = '$lname'";
    }
    else if (!empty($lname)) {
      $sql += " driverLastName = '$lname'";
    }

    if ($cont && !empty($email)) {
      $sql += ", driverEmail = '$email'";
    }
    else if (!empty($email)) {
      $sql += " driverEmail = '$lemail'";
    }

    $sql += " where driverUsername = '$_SESSION['dUsername']''";
  }


  if (!$err) {
    require_once("truckingDB.php");

    $result = $mydb->query($sql);

    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location:updateDriverConfirm.php");
  }
}


}
  ?>

<!doctype html>
<html>
<head>
  <title>Driver Management - Update Driver</title>
  <style>
    .errorLabel {color:red;}
  </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

    <!-- Personal Info -->
    <label>First Name:</label>
    <input type="text" name="firstname"/><br />
    <?php
      if ($err && empty($fname)) {
        echo "<label class='errorLabel'>Error: Please enter a first name</label>";
      }
    ?>
    <br />

    <label>Last Name:</label>
    <input type="text" name="lastname"/><br />
    <?php
      if ($err && empty($lname)) {
        echo "<label class='errorLabel'>Error: Please enter a last name</label>";
      }
    ?>
    <br />

    <label>Email:</label>
    <input type="text" name="email"/><br />
    <?php
      if ($err && empty($email)) {
        echo "<label class='errorLabel'>Error: Please enter an email address</label>";
      }
    ?>
    <br />

    <label>Date of Birth:</label>
    <input type="text" name="dateofbirth"/><br />
    <?php
      if ($err && empty($dob)) {
        echo "<label class='errorLabel'>Error: Please enter a date of birth</label>";
      }
    ?>
    <br />

    <input type="submit" value="Submit" name="submit" />
  </form><br/>

  <!-- Todo -->
  <input type="button" class="button" onClick="location.href='Home.html'" value="Home">

</body>
</html>
