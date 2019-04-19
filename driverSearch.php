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
$error = false;
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

  if (!empty($drivID) && !empty($manID)){
    $error = true;
  }

  if (!$error) {
  echo "Redirect";
  header("HTTP/1.1 307 Temprary Redirect"); //
  header("Location: driverSearchResults.php");
  }

}
?>

<!doctype html>
<html>
<head>
  <title>Driver Management - Driver Search</title>

</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

    <!-- ID -->
    <label>Driver ID:<label>
    <input type="text" name="driverID"/><br />
    <br />

    <label>Manager ID:<label>
    <input type="text" name="managerID"/><br />
    <br />
    <?php
      if ($error && !empty($drivID) && !empty($manID)) {
        echo "<label class='errorlabel'>Only fill one of the fields above or neither</label>";
      }
    ?>
    <br /><br />

    <!-- Name -->
    <label>First Name:</label>
    <input type="text" name="firstname"/><br />
    <br />

    <label>Last Name:</label>
    <input type="text" name="lastname"/><br />
    <br />

    <!-- Status -->
    <input type="radio" name="status" value="active">Active
    <input type="radio" name="status" value="inactive">Inactive
    <br /><br />

    <!-- Salary -->
    <label>Salary Above:</label>
    <input type="text" name="salAbove"/><br />
    <br />

    <p>OR</p>

    <label>Salary Below:</label>
    <input type="text" name="salBelow"/><br />
    <br />

    <!-- Miles Driven -->
    <label>Miles Driven Above:</label>
    <input type="text" name="milesAbove"/><br />
    <br />

    <p>OR</p>

    <label>Miles Driven Below:</label>
    <input type="text" name="milesBelow"/><br />
    <br />

    <!-- Days Employed -->
    <label>Days Employed More Than:</label>
    <input type="text" name="daysAbove"/><br />
    <br />

    <p>OR</p>

    <label>Days Employed Less Than:</label>
    <input type="text" name="daysBelow"/><br />
    <br />

    <input type="submit" value="Submit" name="submit" />
  </form><br/>

  <!-- Todo -->
  <input type="button" class="button" onClick="location.href='Home.html'" value="Home">

</body>
</html>
