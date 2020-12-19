<head>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $( function() {
      $( "#accordion" ).accordion();
    } );
  </script>

  <style>
    * {
      font-famil:Arial, Helvetica, sans-serrif;
    }
  </style>

</head>

<?php

  include "db_connect.php";
  $keywordfromform = $_GET["keyword"];

  $keywordfromform = "%" . $keywordfromform . "%";

  echo "<h1>Show all jokes with the word: " . $_GET["keyword"] . "</h1>";

  $sql = "SELECT JokeID, Joke_question, Joke_answer, users_ID, username, google_name FROM Jokes_table JOIN users on Jokes_table.users_ID = users.id";
  $result = $mysqli->query($sql);

  // $res = $mysqli->query("SELECT google_users.google_name, Jokes_table.JokeID, Jokes_table.users_ID, Jokes_table.Joke_question, Jokes_table.Joke_answer FROM google_users INNER JOIN Jokes_table ON google_users.google_id = Jokes_table.users_ID WHERE Jokes_table.Joke_question LIKE $keywordfromform");
  //
  // echo "Select returned $res->num_rows rows of data<br>";

  // $stmt = $mysqli->prepare("SELECT JokeID, Joke_question, Joke_answer, users_ID, username FROM Jokes_table JOIN users ON users.ID = jokes_table.users_ID WHERE Joke_question LIKE ?");
  // $stmt->bind_param("s", $keywordfromform);
  //
  // $stmt->execute();
  // $stmt->store_result();
  //
  // $stmt->bind_result($JokeID, $Joke_question, $Joke_answer, $userid, $username);

?>

<div class="panel-group" id="accordion">

  <?php while($row = $result->fetch_assoc()) { ?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['JokeID']?>"><?php echo $row['Joke_question']?></a>
        </h4>
      </div>

      <div id="collapse<?php echo $row['JokeID']?>" class="panel-collapse collapse">
        <div class="panel-body"><?php echo $row['Joke_answer'] . " - Submitted by " . $row['google_name']?></div>
      </div>
    </div>

  <?php } ?>

    <!-- // while($row = $stmt->fetch()) {
    //   $safe_joke_question = htmlspecialchars($Joke_question);
    //   $safe_joke_answer = htmlspecialchars($Joke_answer);
    //
    //   echo "<h3>$safe_joke_question</h3>";
    //   echo "<div><p>" . $safe_joke_answer . " - Submitted by user " . $username . "</p></div>";
    // } -->

</div>

<a href="index.php">Return to main page</a>
