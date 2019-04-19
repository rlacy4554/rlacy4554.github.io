<?php
  $score;
  $comment = "";
  $error = false;

  if (isset($_POST["login"])) {
    if (isset($_POST["score"])) $score = $_POST["score"];
    if (isset($_POST["comment"])) $comment = $_POST["comment"];

    if (empty($score) && empty($comment)) {
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

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Driver Management - Survey</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- main css -->
  <link href="css/style.css" rel="stylesheet">


  <!-- modernizr -->
  <script src="js/modernizr.js"></script>
</head>
<body>
  <p>Driver Survey</p><br /><br />

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

    <label>On a scale of 1 to 10, how satisfing is you job?</label><br />
    <input type="number" name="score" min="1" max="10">
    <br /><br />

    <label>Any complaints?</label><br />
    <input type="text" name="comment">

    <input type="submit" value="Submit" name="submit" />
  </form><br /><br />

  <input type="button" class="button" onClick="location.href='Home.html'" value="Home">

</body>
</html>
