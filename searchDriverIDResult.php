<?php
$drivID;

if (isset($_POST["submit"]))
{
  if(isset($_POST["driverID"])) $drivID=$_POST["driverID"];
}
?>

<!doctype html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Driver Management - Driver Search Results</title>

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

  $sql= "select * FROM driver where driverID = $drivID";

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
