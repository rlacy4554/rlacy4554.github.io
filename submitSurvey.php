<?php
  $dID;
  $score;
  $comment = "";
  $complaint = "";
  $error = false;

  if (isset($_POST["submit"])) {
    if (isset($_POST["driverID"])) $dID = $_POST["driverID"];
    if (isset($_POST["score"])) $score = $_POST["score"];
    if (isset($_POST["comment"])) $comment = $_POST["comment"];
    if (isset($_POST["complaint"])) $complaint = $_POST["complaint"];

    if (empty($dID) || empty($score)) {
      $error = true;
    }

    if (!$error) {
      // Add survey record
      header("HTTP/1.1 307 Temprary Redirect"); //
      header("Location: surveyConfirm.php");
    }
  }

?>

<!doctype html>
<html>
<head>
  <title>Trucking Management - Survey</title>
  <link rel="stylesheet" type="text/css" href="trucking.css">
</head>
<body>
  <br />
  <div id="footer">
    <a href="Home.html">Logout</a>
    <a href="driverHome.php">Driver Home</a>
  </div>
  <br /><br />
  <div id="header">
    <p id="subhead">Driver Survey</p>
  </div>
  <br /><br />
  <div id="content">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

      <label>Driver ID:</label><br />
      <input type="number" name="driverID">
      <?php
        if ($error && empty($dID)) {
          echo "<br /><label class='errorLabel'>Please enter your Driver ID</label><br />";
        }
      ?>
      <br /><br />

      <label>On a scale of 1 to 10, how satisfying is your job?</label><br />
      <input type="number" name="score" min="1" max="10">
      <?php
        if ($error && empty($score)) {
          echo "<br /><label class='errorLabel'>Please enter a satisfaction score</label><br />";
        }
      ?>
      <br /><br />

      <label>Comments? (Optional)</label><br />
      <input type="text" name="comment">
      <br /><br />

      <label>Complaints? (Optional)</label><br />
      <input type="text" name="complaint">
      <br /><br /><br />

      <input type="submit" value="Submit" name="submit" />
    </form>
  </div>


</body>
</html>
