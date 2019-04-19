<?php
$dID;
$sCity;
$sState;
$dCity;
$dState;
$miles;
$error = false;

if (isset($_POST["submit"])) {
  if (isset($_POST["driverID"])) $dID = $_POST["driverID"];
  if (isset($_POST["sourceCity"])) $sCity = $_POST["sourceCity"];
  if (isset($_POST["sourceState"])) $sState = $_POST["sourceState"];
  if (isset($_POST["destCity"])) $dCity = $_POST["destCity"];
  if (isset($_POST["destState"])) $dState = $_POST["destState"];
  if (isset($_POST["milesDriven"])) $miles = $_POST["milesDriven"];

  if (empty($dID) || empty($sCity) || empty($sState) || empty($dCity) ||
    empty($dState) || empty($miles)) {
      $error = true;
  }

  if (!$error) {
    echo "Redirect";
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location: recordTripConfirm.php");
  }
}

?>

<!doctype html>
<html>
<head>
  <title>Trucking Management - Record Trip</title>
  <link rel="stylesheet" type="text/css" href="trucking.css">
</head>
<body>
  <br />
  <div id="footer">
    <a href="driverHome.php">Driver Home</a>
    <a href="Home.html">Logout</a>
  </div>
  <br /><br />

  <div id="header">
    <p id="subhead">Record Trip</p>
  </div>
  <br /><br />
  <div id="content">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

      <label>Driver ID:</label>
      <input type="number" name="driverID">
      <?php
        if ($error && empty($dID)) {
          echo "<br /><label class='errorLabel'>Please enter your Driver ID</label><br />";
        }
      ?>
      <br /><br />

      <label>Source City:</label>
      <input type="text" name="sourceCity" placeholder="Virginia Beach">
      <?php
        if ($error && empty($sCity)) {
          echo "<br /><label class='errorLabel'>Please enter a source city</label><br />";
        }
      ?>
      <br /><br />

      <label>Source State (abv.):</label>
      <input type="text" name="sourceState" placeholder="VA">
      <?php
        if ($error && empty($sState)) {
          echo "<br /><label class='errorLabel'>Please enter a source state</label><br />";
        }
      ?>
      <br /><br />

      <label>Destination City:</label>
      <input type="text" name="destCity" placeholder="Charlston">
      <?php
        if ($error && empty($dCity)) {
          echo "<br /><label class='errorLabel'>Please enter a destination city</label><br />";
        }
      ?>
      <br /><br />

      <label>Source State (abv.):</label>
      <input type="text" name="destState" placeholder="SC">
      <?php
        if ($error && empty($dState)) {
          echo "<br /><label class='errorLabel'>Please enter a destination state</label><br />";
        }
      ?>
      <br /><br />

      <label>Miles Driven:</label>
      <input type="number" name="milesDriven" placeholder="200">
      <?php
        if ($error && empty($miles)) {
          echo "<br /><label class='errorLabel'>Please enter a valid number of miles</label><br />";
        }
      ?>
      <br /><br /><br />

      <input type="submit" value="Submit" name="submit" />
    </form>
  </div>
</body>
</html>
