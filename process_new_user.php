<?php

  include "db_connect.php";

  $new_username = $_GET['username'];
  $new_password1 = $_GET['password1'];
  $new_password2 = $_GET['password2'];

  $hashed_password = password_hash($new_password1, PASSWORD_DEFAULT);

  // check if passwords match
  if ($new_password1 != $new_password2) {
    echo "The passwords do not match. Try again";
    exit;
  }

  // password must contain 0-9
  preg_match('/[0-9]+/', $new_password1, $matches);
  if(sizeof($matches) == 0) {
    echo "The password must have at least one number<br>";
    echo "<a href='index.php'>Return to Main Page<a>";
    exit;
  }

  // password must contain a special character
  preg_match('/[!@#$%^&*()]+/', $new_password1, $matches);
  if(sizeof($matches) == 0) {
    echo "The password must have at least one special character like !@#$%^&*()<br>";
    echo "<a href='index.php'>Return to Main Page<a>";
    exit;
  }

  // password must be 8 letters long
  if(strlen($new_password1) <= 8) {
    echo "The password must be at least 8 characters long<br>";
    echo "<a href='index.php'>Return to Main Page<a>";
    exit;
  }

  // check if duplicate users
  $sql = "SELECT * FROM users where username = '$new_username'";

  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

  if ($result->num_rows > 0) {
    echo "The username " . $new_username . " already exists in the database. Try a different username.";
    exit;
  }

  // insert a new user
  $stmt = $mysqli->prepare("INSERT INTO users (id, username, password) VALUES (null, ?, ?)");
  $stmt->bind_param("ss", $new_username, $hashed_password);

  $result = $stmt->execute();

  if ($result) {
    echo "Registration Success<br>";
  }
  else {
    echo "Somthing went wrong. Not registered<br>";
  }

  echo "<a href='index.php'>Return to Main Page<a>";

 ?>
