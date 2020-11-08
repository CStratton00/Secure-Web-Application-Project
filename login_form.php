<html>

<header>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <body>
    <h1>Login for Jokes</h1>

    <?php

      // Connect

      include "db_connect.php";

      // Form
      ?>

      <form class="form-horizontal" action="process_login.php" method="post">
        <fieldset>

        <!-- Form Name -->
        <legend>Please login</legend>

        <!-- Username-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="username">Username</label>
          <div class="col-md-8">
            <input id="username" name="username" type="text" placeholder="username" class="form-control input-md">
            <p class="help-block">Please enter you username</p>
          </div>
        </div>

        <!-- Password-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password1">Password</label>
          <div class="col-md-8">
            <input id="password" name="password" type="password" placeholder="password" class="form-control input-md">
            <p class="help-block">Please enter your password</p>
          </div>
        </div>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-info">Login</button>
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
