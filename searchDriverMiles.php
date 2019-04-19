<?php
$minMil;
$maxMil;
$error = false;

if (isset($_POST["submit"]))
{
  if(isset($_POST["minMiles"])) $minMil=$_POST["minMiles"];
  if(isset($_POST["maxMiles"])) $maxMil=$_POST["maxMiles"];

  if (empty($minMil) && empty($maxMil)) {
    $error = true;
  }

  if (!$error) {
  echo "Redirect";
  header("HTTP/1.1 307 Temprary Redirect"); //
  header("Location: searchDriverMilesResult.php");
  }

}
?>

<!doctype html>
<html>
<head>
    <title>Driver Management - Driver Search</title>
</head>
<body>
  <style>
    .errorLabel {color:red;}
  </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

    <p>Search Driver By Miles Driven</p><br / /><br / />
    <!-- Salary -->
    <label>Minimum Miles:<label>
    <input type="number" name="minMiles"/><br />
    <br />

    <label>Maximum Miles:<label>
    <input type="number" name="maxMiles"/><br />
    <br />

    <input type="submit" value="Submit" name="submit" />
  </form><br/>

  <!-- Todo -->
  <input type="button" class="button" onClick="location.href='Home.html'" value="Home">

</body>
</html>
