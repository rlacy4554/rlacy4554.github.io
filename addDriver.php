<?php
$uname = "";
$pass = "";
$manID;
$fname = "";
$lname = "";
$email = "";
$dob = "";
$salary;
$sDate = "";
$err = false;
if (isset($_POST["submit"]))
{
  if(isset($_POST["username"])) $uname=$_POST["username"];
  if(isset($_POST["password"])) $pass=$_POST["password"];
  if(isset($_POST["managerID"])) $manID=$_POST["managerID"];
  if(isset($_POST["firstname"])) $fname=$_POST["firstname"];
  if(isset($_POST["lastname"])) $lname=$_POST["lastname"];
  if(isset($_POST["email"])) $email=$_POST["email"];
  if(isset($_POST["dateofbirth"])) $dob=$_POST["dateofbirth"];
  if(isset($_POST["salary"])) $salary=$_POST["salary"];
  if(isset($_POST["startDate"])) $sDate=$_POST["startDate"];
  if(!empty($uname) && !empty($pass) && !empty($manID) && !empty($fname) &&
    !empty($lname) && !empty($email) && !empty($dob) && !empty($salary) && !empty($sDate))
  {
    header("HTTP/1.1 307 Temprary Redirect"); //
    header("Location:addDriverConfirm.php");
  }
  else
    {
      $err = true;
    }
}
  ?>

<!doctype html>
<html>
<head>
  
  <style>
    .errorLabel {color:red;}
  </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <!-- Login Info -->
    <label>Username:<label>
    <input type="text" name="username"/><br />
    <?php
      if ($err && empty($uname)) {
        echo "<label class='errorLabel'>Error: Please enter a username</label>";
      }
    ?>
    <br />

    <label>Password:<label>
    <input type="text" name="password"/><br />
    <?php
      if ($err && empty($pass)) {
        echo "<label class='errorLabel'>Error: Please enter a password</label>";
      }
    ?>

    <label>Manager ID:<label>
    <input type="text" name="managerID"/><br />
    <?php
      if ($err && empty($manID)) {
        echo "<label class='errorLabel'>Error: Please enter a manager ID</label>";
      }
    ?>
    <br />
    <br /><br />


    <!-- Personal Info -->
    <label>First Name:</label>
    <input type="text" name="firstname"/><br />
    <?php
      if ($err && empty($fname)) {
        echo "<label class='errorLabel'>Error: Please enter a first name</label>";
      }
    ?>
    <br />

    <label>Last Name:</label>
    <input type="text" name="lastname"/><br />
    <?php
      if ($err && empty($lname)) {
        echo "<label class='errorLabel'>Error: Please enter a last name</label>";
      }
    ?>
    <br />

    <label>Email:</label>
    <input type="text" name="email"/><br />
    <?php
      if ($err && empty($email)) {
        echo "<label class='errorLabel'>Error: Please enter an email address</label>";
      }
    ?>
    <br />

    <label>Date of Birth:</label>
    <input type="text" name="dateofbirth"/><br />
    <?php
      if ($err && empty($dob)) {
        echo "<label class='errorLabel'>Error: Please enter a date of birth</label>";
      }
    ?>
    <br />

    <label>Salary:</label>
    <input type="text" name="salary"/><br />
    <?php
      if ($err && empty($salary)) {
        echo "<label class='errorLabel'>Error: Please enter a salary</label>";
      }
    ?>

    <label>Start Date:</label>
    <input type="text" name="startDate"/><br />
    <?php
      if ($err && empty($sDate)) {
        echo "<label class='errorLabel'>Error: Please enter a start date</label>";
      }
    ?>
    <br /><br />

    <input type="submit" value="Submit" name="submit" />
  </form><br/>

  <!-- Todo -->
  <input type="button" class="button" onClick="location.href='Home.html'" value="Home">

</body>
</html>
