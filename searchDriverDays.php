<?php
$minDays;
$maxDays;
$error = false;

if (isset($_POST["submit"]))
{
  if(isset($_POST["minDays"])) $minDays=$_POST["minDays"];
  if(isset($_POST["maxDays"])) $maxDays=$_POST["maxDays"];

  if (empty($minDays) && empty($maxDays)) {
    $error = true;
  }

  if (!$error) {
  echo "Redirect";
  header("HTTP/1.1 307 Temprary Redirect"); //
  header("Location: searchDriverDaysResult.php");
  }

}
?>

<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Driver Management - Driver Search</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet">


    <!-- modernizr -->
    <script src="js/modernizr.js"></script>
</head>
<body>
  <style>
    .errorLabel {color:red;}
  </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

    <p>Search Driver By Days Employed</p><br /><br />
    <!-- Salary -->
    <label>Minimum Days:<label>
    <input type="number" name="minDays"/><br />
    <br />

    <label>Maximum Days:<label>
    <input type="number" name="maxDays"/><br />
    <br />

    <input type="submit" value="Submit" name="submit" />
  </form><br/>

  <!-- Todo -->
  <input type="button" class="button" onClick="location.href='Home.html'" value="Home">

</body>
</html>
