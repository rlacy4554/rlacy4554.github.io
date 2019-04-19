<?php
$drivID;
$manID;
$fname = "";
$lname = "";
$status = "";
$salAbove;
$salBelow;
$milAbove;
$milBelow;
$daysAbove;
$daysBelow;
$cont = false;

if (isset($_POST["submit"]))
{
  if(isset($_POST["driverID"])) $drivID=$_POST["driverID"];
  if(isset($_POST["managerID"])) $manID=$_POST["managerID"];
  if(isset($_POST["firstname"])) $fname=$_POST["firstname"];
  if(isset($_POST["lastname"])) $lname=$_POST["lastname"];
  if(isset($_POST["status"])) $status=$_POST["status"];
  if(isset($_POST["salAbove"])) $salAbove=$_POST["salAbove"];
  if(isset($_POST["salBelow"])) $salBelow=$_POST["salBelow"];
  if(isset($_POST["milesAbove"])) $milAbove=$_POST["milesAbove"];
  if(isset($_POST["milesBelow"])) $milBelow=$_POST["milesBelow"];
  if(isset($_POST["daysAbove"])) $daysAbove=$_POST["daysAbove"];
  if(isset($_POST["daysBelow"])) $daysBelow=$_POST["daysBelow"];
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Driver Search Results </title>

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="css/style.css" rel="stylesheet">


  <!-- modernizr -->
  <script src="js/modernizr.js"></script>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="css/style.css" rel="stylesheet">


  <!-- modernizr -->
  <script src="js/modernizr.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="css/style.css" rel="stylesheet">


  <!-- modernizr -->
  <script src="js/modernizr.js"></script>
</head>
<body>

<?php
  require_once("truckingDB.php");

  $sql= "select * FROM driver";

  if (!empty($drivID)) {
    $sql += " WHERE driverID = '$drivID'";
    $cont = true;
  }

  if (!empty($manID)) {
    $sql += " WHERE managerID = '$manID'";
    $cont = true;
  }

  if ($cont && !empty($status)) {
    $sql .= " and employmentStatus = '$status'";
  }
  else if (!empty($status)) {
    $sql .= " employmentStatus = '$status'";
    $cont = true;
  }

  // ADD OR CASES
  // Salary
  if ($cont && !empty($salAbove)) {
    $sql += " and driverSalary > $salAbove";
  }
  else if (!empty($salAbove)) {
    $sql .= " driverSalary > $salAbove";
    $cont = true;
  }

  if ($cont && !empty($salBelow)) {
    $sql += " and driverSalary < $salBelow";
  }
  else if (!empty($salBelow)) {
    $sql += " driverSalary < $salBelow";
    $cont = true;
  }

  // Miles Driven
  if ($cont && !empty($milAbove)) {
    $sql += " and totalMilesDriven > $milAbove";
  }
  else if (!empty($milAbove)) {
    $sql += " totalMilesDriven > $milAbove";
    $cont = true;
  }

  if ($cont && !empty($milBelow)) {
    $sql += " and totalMilesDriven < $milBelow";
  }
  else if (!empty($milBelow)) {
    $sql += " totalMilesDriven < $milBelow";
    $cont = true;
  }

  // Days Employed
  if ($cont && !empty($daysAbove)) {
    $sql += " and daysEmployed > $daysAbove";
  }
  else if (!empty($daysAbove)) {
    $sql += " daysEmployed > $daysAbove";
    $cont = true;
  }

  if ($cont && !empty($daysBelow)) {
    $sql += " and daysEmployed < $daysBelow";
  }
  else if (!empty($daysBelow)) {
    $sql += " daysEmployed < $daysBelow";
    $cont = true;
  }

  $result = $mydb->query($sql);
  echo "<table>";
  echo "<thead>";
  echo "<th>Driver ID</th><th>Manager ID</th><th>Username</th><th>Password</th>
  <th>Status</th><th>First Name</th><th>Last Name</th><th>Email</th><th>DOB</th>
  <th>Salary</th><th>Total Miles</th><th>Hire Date</th><th>ResignDate</th><th>Days Employed</th><th>Days From Home</th>";
  echo "</thead>";


  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<td>".$row["driverID"]."</td><td>".$row["managerID"]."</td><td>".$row["driverUsername"]."</td><td>".
    $row["driverPassword"]."</td><td>".$row["employmentStatus"]."</td><td>".$row["driverFirstName"]."</td><td>".
    $row["driverLastName"]."</td><td>".$row["driverEmail"]."</td><td>".$row["driverDOB"]."</td><td>".
    $row["driverSalary"]."</td><td>".$row["totalMilesDriven"]."</td><td>".$row["hireDate"]."</td><td>".
    $row["resignDate"]."</td><td>".$row["daysEmployed"]."</td><td>".$row["totalDaysFromHome"]."</td>";
    echo "</tr>";
  }

?>

<input type="button" onclick="location.href='managerHome.php'" value="Manager Home" /> &nbsp; &nbsp;

</body>
</html>
