<?php

if (isset($_POST["listDrivers"])){
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: listAllDrivers.php");
  }

if (isset($_POST["searchDriverID"])){
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: searchDriverID.php");
  }

if (isset($_POST["searchDriverSalary"])){
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: searchDriverSalary.php");
  }

if (isset($_POST["searchDriverMiles"])){
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: searchDriverMiles.php");
  }

if (isset($_POST["searchDriverDays"])){
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: searchDriverDays.php");
  }

if (isset($_POST["addDriver"])){
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: addDriver.php");
  }
?>

<!doctype html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Driver Management - Manager Home</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="css/style.css" rel="stylesheet">


  <!-- modernizr -->
  <script src="js/modernizr.js"></script>
</head>
<body>
  <p>Manager Home Page<p><br /><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="submit" name="addDriver" value="Add Driver" />
  </form><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="submit" name="searchDriverID" value="Search Driver By ID" />
  </form><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="submit" name="searchDriverSalary" value="Search Driver By Salary" />
  </form><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="submit" name="searchDriverMiles" value="Search Driver By Miles Driven" />
  </form><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="submit" name="searchDriverDays" value="Search Driver By Days Employed" />
  </form><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input type="submit" name="listDrivers" value="List All Drivers" />
  </form>

</body>
</html>
