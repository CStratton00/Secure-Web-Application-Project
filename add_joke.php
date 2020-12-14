<?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  session_start();

  // if(! $_SESSION['username']) {
  //   echo "Only logged in users can add a joke. Click <a href='login_form.php' </a>here to login<br>";
  //   exit;
  // }

  include "db_connect.php";
  $newjokequestion = addslashes($_GET['newjoke']);
  $newjokeanswer = addslashes($_GET['jokeanswer']);

  $newjokequestion = addslashes($newjokequestion);
  $newjokeanswer = addslashes($newjokeanswer);
  $userid = $_SESSION['userid'];

  echo "<h2>New Joke Added: $newjokequestion - $newjokeanswer</h2>";

  $sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_ID) VALUES (NULL, '$newjokequestion', '$newjokeanswer', '$userid')";

  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));
  include "search_all_jokes.php";

  // $stmt = $mysqli->prepare("INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_ID) VALUES (NULL, ?, ?, ?)");
  // $stmt->bind_param("ssi", $newjokequestion, $newjokeanswer, $userid);
  //
  // $stmt->execute();
  // $stmt->close();

?>

<a href="index.php">Return to main page</a>
