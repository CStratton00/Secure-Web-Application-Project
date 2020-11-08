<?php

  session_start();

  error_reporting[E_ALL];
  ini_set('display_errors', 1);

  include "db_connect.php";

  // safely grab username and password using POST
  $username = addslashes($_POST["username"]);
  $password = addslashes($_POST["password"]);

  // grab the id, username, and password fromm the database
  $stmt = $mysqli->prepare("SELECT id, username, password FROM users where username = ?");
  $stmt->bind_param("s", $username);

  $stmt->execute();
  $stmt->store_result();

  $stmt->bind_result($userid, $uname, $pw);

  // check if username and password(hashed) match
  if($stmt->num_rows == 1) {
    $stmt->fetch();
    if(password_verify($password, $pw)) {
      echo "<h3>Password Match<br>";
      echo "Login Success<br>";
      $_SESSION['username'] = $uname;
      $_SESSION['userid'] = $userid;
      echo "<br><a href='index.php'>Return to main page</a></br>";
      exit;
    } else {
      $_SESSION = [];
      session_destroy();
    }
  } else {
    $_SESSION = [];
    session_destroy();
  }
  echo "<h2>Login Fail<br>";
  echo "<br><a href='login_form.php'>Return to login</a></br>";
  echo "<br><a href='index.php'>Return to main page</a></br>";

?>
