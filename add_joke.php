<?php

  session_start();

  if(! $_SESSION['username']) {
    echo "Only logged in users can add a joke. Click <a href='login_form.php' </a>here to login<br>";
    exit;
  }

  include "db_connect.php";
  $newjokequestion = addslashes($_GET['newjoke']);
  $newjokeanswer = addslashes($_GET['jokeanswer']);
  $userid = $_SESSION['userid'];

  $newjokequestion = addslashes($newjokequestion);
  $newjokeanswer = addslashes($newjokeanswer);

  echo "<h2>New Joke Added: $newjokequestion - $newjokeanswer</h2>";

  $stmt = $mysqli->prepare("INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer, users_ID) VALUES (NULL, ?, ?, ?)");
  $stmt->bind_param("ssi", $newjokequestion, $newjokeanswer, $userid);

  $stmt->execute();
  $stmt->close();

  include "search_all_jokes.php";

?>

<a href="index.php">Return to main page</a>
