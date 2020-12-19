<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once('vendor/autoload.php');

$client_id = '775891253213-gd1lgfa4q3ajnt2e1lm6hlircgiq2rsv.apps.googleusercontent.com';
$client_secret = 'AQD_r_9XeW3dec-AbeBAQx1Y';
$redirect_uri = 'http://localhost:8888/Jokes_Website/google_login.php';

$db_username = "root";
$db_password = "root";
$host_name = "localhost";
$db_name = 'test';
$port = 8888;


$guzzle = new GuzzleHttp\Client(['verify'=>false]);

$client = new Google_Client();
$client->setHttpClient($guzzle);
$client->setClientID($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);

if(isset($_GET['logout'])) {
  $client->revokeToken($_SESSION['access_token']);
  session_destroy();
  header('Location: index.php');
}

if(isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

if(isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

echo '<div style="margin:20px">';
if(isset($authUrl)) {
  echo '<div align="center">';
  echo '<h1>Login</h1>';
  echo '<p>You will need a Google account to sign in.</p>';
  echo '<a class="login" href="' .$authUrl . '">Login here</a>';
  echo '</div>';
  exit;
} else {
  $user = $service->userinfo->get();

  $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name, $port);

  if($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno .') ' . $mysqli->connect_error);
  }

  $stmt = $mysqli->prepare("SELECT id, username, password, google_id, google_name, google_email, google_picture_link FROM users WHERE google_id=?");
  $stmt->bind_param("s", $user->id);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($userid, $username, $password, $google_id, $google_name, $google_email, $google_picture_link);

  if($stmt->num_rows > 0) {
    echo "<h2>Welcome back " .$user->name. "!</h2>";
    echo "<p><a href='" .$redirect_uri. "?logout=1'>Log Out</a></p>";
    echo "<p><a href='index.php'>Go to main page</a></p>";

    while($stmt->fetch()) {
      echo "According to the database records, you are:<br>";
      echo "<br>userid = " . $userid;
      echo "<br>username = " . $username;
      echo "<br>password = " . $password;
      echo "<br>google_id = " . $google_id;
      echo "<br>google_name = " . $google_name;
      echo "<br>google_email = " . $google_email;
      echo "<br>google_picture_link = " . $google_picture_link;
    }

    $_SESSION['username']=$user->name;
    $_SESSION['googleuserid']=$user->id;
    $_SESSION['useremail']=$user->email;
    $_SESSION['userid']=$userid;
  } else {
    echo "<h2>Welcome " . $user->name . "! Thanks for Registering!!</h2>";

    $statement = $mysqli->prepare("INSERT INTO users(google_id, google_name, google_email, google_picture_link) VALUES(?,?,?,?)");
    $statement->bind_param('ssss', $user->id, $user->name, $user->email, $user->picture);

    $statement->execute();
    $newuserid = $statement->insert_id;
    echo $mysqli->error;
    echo "<p>Created new user:</p>";

    echo "New user id = " . $newuserid . "<br>";
    echo "<br>google_id = " . $user->id;
    echo "<br>google_name = " . $user->name;
    echo "<br>google_email = " . $user->email;
    echo "<br>google_picture_link = " . $user->picutre;

    $_SESSION['username']=$user->name;
    $_SESSION['googleuserid']=$user->id;
    $_SESSION['useremail']=$user->email;
    $_SESSION['userid']=$newuserid;
  }

  echo "<p>About this user</p>";
  echo "<url>";
  echo "<img src='" .$user->picture. "'/>";
  echo "<li>Username: " .$user->name. "</li>";
  echo "<li>User ID: " .$_SESSION['userid']. "</li>";
  echo "<li>User Email: " .$user->email. "</li>";
  echo "</url>";
  echo "<a href='index.php'>Return to main page</a>";

  echo "<br>Session values = <br>";
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";

}
echo '</div>';
 ?>

 <style>
 body {
   font_family: "helvetica";
 }
 img {
   height:100px;
 }
 </style>
