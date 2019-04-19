<?php
  $uname = "";
  $pass = "";
  $error = false;
  $loginOK = null;

  if (isset($_POST["login"])) {
    if (isset($_POST["driverUsername"])) $uname = $_POST["driverUsername"];
    if (isset($_POST["driverPassword"])) $pass = $_POST["driverPassword"];

    if(empty($uname) || empty($pass)) {
      $error = true;
    }

    if (!$error) {
      //check credentials
      require_once("truckingDB.php");
      $sql = "select driverPassword from driver where driverUsername='$uname'";
      $result = $mydb->query($sql);

      $row = mysqli_fetch_array($result);
      if ($row) {
        if (strcmp($pass, $row["driverPassword"]) == 0) {
          $loginOK = true;
        }
        else {
          $loginOK = false;
        }
      }

      if ($loginOK) {
        //set session to remember Login
        //header("HTTP/1.1 307 Temporary Redirect");
        session_start();
        $_SESSION["dUsername"] = $uname;
        $_SESSION["dPassword"] = $pass;
        header("Location: driverHome.php");
      }
    }
  }
?>

<!doctype html>
<html>
<head>
  <title>Trucking Management - Driver Login</title>
  <link rel="stylesheet" type="text/css" href="trucking.css">
</head>
<body>
  <br />
  <div id="footer">
    <a href="Home.html">Home</a>
  </div>
  <br /><br />
  <div id="header">
    <p id="subhead">Driver Login</p>
  </div>
  <br /><br />
  <div id="content">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

      <!-- Invalid Login -->

      <label>Username:</label><br />
      <input class="fixed-input" type="text" name="driverUsername" value="<?php echo $uname;?>"/>
      <?php
        if ($error && empty($uname)) {
          echo "<br /><label class='errorLabel'>Please enter a username</label>";
        }
      ?>
      <br/> <br />

      <label>Password:</label><br />
      <input class="fixed-input" type="password" name="driverPassword" value="<?php echo $pass;?>"/>
      <?php
        if ($error && empty($pass)) {
          echo "<br /><label class='errorLabel'>Please enter a password</label>";
        }
      ?>
      <br /><br /><br />

      <input type="submit" name="login" value="Login">
    </form>
  </div>
</form>
</body>
</html>
