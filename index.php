<html>

<header>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <body>
    <h1>Jokes Page</h1>
    <a href="logout.php">Click here to log out<a>
    <a href="login_form.php">Click here to login<a>
    <a href="register_new_user.php">Click here to register<a><br>

    <?php

      // Connect

      include "db_connect.php";

      // Form
      ?>

      <form class="form-horizontal" action="search_keyword.php">
        <fieldset>

        <!-- Form Name -->
        <legend>Search for keyword</legend>

        <!-- Search input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="keyword">Search Input</label>
          <div class="col-md-8">
            <input id="keyword" name="keyword" type="search" placeholder="e.g. chicken" class="form-control input-md">
            <p class="help-block">Enter a word to search for in the jokes database</p>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-info">Search</button>
          </div>
        </div>

        </fieldset>
      </form>


      <hr>
      <form class="form-horizontal" action="add_joke.php">
        <fieldset>

        <!-- Form Name -->
        <legend>Add new joke</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="newjoke">Enter the text of your new joke</label>
          <div class="col-md-8">
          <input id="newjoke" name="newjoke" type="text" placeholder="" class="form-control input-md">
          <span class="help-block">Enter the first half of your joke</span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="jokeanswer">Enter the answer to your joke</label>
          <div class="col-md-6">
          <input id="jokeanswer" name="jokeanswer" type="text" placeholder="" class="form-control input-md">
          <span class="help-block">Enter the second half or punchline to your joke</span>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="add"></label>
          <div class="col-md-4">
            <button id="add" name="add" class="btn btn-success">Add Joke</button>
          </div>
        </div>

        </fieldset>
      </form>


      <?php

      $mysqli->close();

     ?>

  </body>
</header>

</html>
