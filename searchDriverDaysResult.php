<?php
$minDays;
$maxDays;

if (isset($_POST["submit"]))
{
  if(isset($_POST["minDays"])) $minDays=$_POST["minDays"];
  if(isset($_POST["maxDays"])) $maxDays=$_POST["maxDays"];
}
?>

<!doctype html>
<html>
<head>
  <title>Driver Management - Driver Search Results</title>
</head>
<body>

<?php
  require_once("truckingDB.php");

  if (!empty($minDays)) {
    $sql= "select * FROM driver where daysEmployed > $minDays";
  }
  else if (!empty($maxDays)) {
    $sql = "select * FROM driver where daysEmployed < $maxDays";
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
