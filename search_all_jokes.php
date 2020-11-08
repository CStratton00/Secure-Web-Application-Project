<?php

  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  echo $mysqli->host_info . "<br>";

  $sql = "SELECT JokeID, Joke_question, Joke_answer, users_ID FROM Jokes_table";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<h3>" . $row['Joke_question'] . "</h3>";

      echo "<div><p>" . $row['Joke_answer'] . " submitted by user #" . $row['users_ID'] . "</p></d>";
    }
  } else {
    echo "0 results";
  }

?>
