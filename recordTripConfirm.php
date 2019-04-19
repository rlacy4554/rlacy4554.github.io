<!doctype html>
<html>
<head>
  <title>Trucking Management - Record Trip Confirmation</title>
  <link rel="stylesheet" type="text/css" href="trucking.css">
</head>
<body>
  <br />
  <div id="footer">
    <a href="driverHome.php">Driver Home</a>
    <a href="Home.html">Logout</a>
  </div>
  <br /><br />
<?php
  $dID;
  $sCity = "";
  $sState = "";
  $dCity = "";
  $dState = "";
  $newMiles;
  $curMiles;
  $totMiles;
  $result;

  if (isset($_POST["driverID"])) $dID = $_POST["driverID"];
  if (isset($_POST["sourceCity"])) $sCity = $_POST["sourceCity"];
  if (isset($_POST["sourceState"])) $sState = $_POST["sourceState"];
  if (isset($_POST["destCity"])) $dCity = $_POST["destCity"];
  if (isset($_POST["destState"])) $dState = $_POST["destState"];
  if (isset($_POST["milesDriven"])) $newMiles = $_POST["milesDriven"];
?>


<?php
  require_once("truckingDB.php");
  $sql = "select totalMilesDriven from driver where driverID = $dID";
  $result=$mydb->query($sql);

  if ($result==1) {
    $row = mysqli_fetch_array($result);
    $curMiles = $row["totalMilesDriven"];
    $totMiles = $curMiles + $newMiles;

    $sql = "update driver set totalMilesDriven = $totMiles where driverID = $dID";
    $result=$mydb->query($sql);

    if ($result==1) {
      $sql = "insert into trip(driverID, sourceCity, sourceState, destinationCity,
        destinationState, milesDriven) values($dID,'$sCity','$sState','$dCity','$dState', $newMiles)";
      $result=$mydb->query($sql);

      if ($result==1) {
        echo "<div id='header'>";
        echo "<p id='subhead'>Trip Recorded Successfully!</p>";
        echo "</div><br /><br /><div id='content'>";
        echo "<p id='confirm'><b>Source:</b> " . $sCity . ", " . $sState . " - <b>Destination:</b> " . $dCity . ", " . $dState . "</p>";
        echo "<p id='confirm'>Your miles have been updated! Your Total Miles Driven is now: </p>";
        echo $totMiles . "</div>";
      }
    }
    else {
      echo "<div id='header'>";
      echo "<p id='subhead'>Trip Record Unsuccessful!</p>";
      echo "</div><br /><br /><div id='content'>";
      echo "<p id='confirm'>Your miles have failed to be updated</p>";
    }

  }
  else {
    echo "<p>Miles failed to be added, please make sure your Driver ID is correct</p>";
  }
?>

</body>
</html>
