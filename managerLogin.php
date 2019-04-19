<?php
  $uname = "";
  $pass = "";
  $error = false;
  $loginOK = null;

  if (isset($_POST["login"])) {
    if (isset($_POST["managerUsername"])) $uname = $_POST["managerUsername"];
    if (isset($_POST["managerPassword"])) $pass = $_POST["managerPassword"];

    if(empty($uname) || empty($pass)) {
      $error = true;
    }

    if (!$error) {
      //check credentials
      require_once("truckingDB.php");
      $sql = "select managerPassword from manager where managerUsername='$uname'";
      $result = $mydb->query($sql);

      $row = mysqli_fetch_array($result);
      if ($row) {
        if (strcmp($pass, $row["managerPassword"]) == 0) {
          $loginOK = true;
        }
        else {
          $loginOK = false;
          echo "invalid login";
        }
      }

      if ($loginOK) {
        //set session to remember Login
        //header("HTTP/1.1 307 Temporary Redirect");
        session_start();
        $_SESSION["mUsername"] = $uname;
        $_SESSION["mPassword"] = $pass;
        header("Location: managerHome.php");
      }
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

  <title>Driver Management - Manager Login</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="css/style.css" rel="stylesheet">


  <!-- modernizr -->
  <script src="js/modernizr.js"></script>
  <style>
    .errorLabel {color:red;}
  </style>
</head>
<body>
  <p>Manager Login</p>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

    <label>Username:</label><br />
    <input type="text" name="managerUsername" value="<?php echo $uname;?>"/>
    <?php
      if ($error && empty($uname)) {
        echo "<label class='errorLabel'>Please enter a username</label>";
      }
    ?>
    <br/> <br />

    <label>Password:</label><br />
    <input type="password" name="managerPassword" value="<?php echo $pass;?>"/>
    <?php
      if ($error && empty($pass)) {
        echo "<label class='errorLabel'>Please enter a password</label>";
      }
    ?>
    <br /><br />

    <input type="submit" name="login" value="Login">
  </form>

<form action="Home.html" method="post">
<button class="button">Home</button>
</form>
</body>
</html>
