<!doctype html>
<html>
<head>
  <title>Trucking Management - Survey Confirmation</title>
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
  $curDate = "";
  $score;
  $comment = "";
  $comlaint = "";
  $result;

  if (isset($_POST["driverID"])) $dID = $_POST["driverID"];
  if (isset($_POST["score"])) $score = $_POST["score"];
  if (isset($_POST["comment"])) $comment = $_POST["comment"];
  if (isset($_POST["complaint"])) $complaint = $_POST["complaint"];

  $curDate = date("Y-m-d");

  require_once("truckingDB.php");

  if (empty($comment) && empty($complaint)) {
    $sql = "insert into survey(driverID, surveyDate, satisfactionScore, comments, complaints)
    values($dID, '$curDate', $score, '', '')";
  }
  else if (!empty($comment) && empty($complaint)) {
    $sql = "insert into survey(driverID, surveyDate, satisfactionScore, comments, complaints)
    values($dID, '$curDate', $score, '$comment', '')";
  }
  else if (!empty($complaint) && empty($comment)) {
    $sql = "insert into survey(driverID, surveyDate, satisfactionScore, comments, complaints)
    values($dID, '$curDate', $score, '', '$complaint')";
  }
  else if (!empty($comment) && !empty($complaint)){
    $sql = "insert into survey(driverID, surveyDate, satisfactionScore, comments, complaints)
    values($dID, '$curDate', $score, '$comment', '$complaint')";
  }

  $result=$mydb->query($sql);
  if ($result==1) {
    echo "<div id='header'>";
    echo "<p id='subhead'>Survey Submitted</p>";
    echo "</div><br /><br /><div id='content'>";
    echo "<p id='confirm'>Thank you for your feedback!</p></div>";
  }
  else {
    echo "<div id='header'>";
    echo "<p id='subhead'>Survey Not Submitted</p>";
    echo "</div><br /><br /><div id='content'>";
    echo "<p id='confirm'>Your survey failed to process, please try again!</p></div>";
  }
?>

</body>
</html>
