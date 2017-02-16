<?php
//begin or resume the session
session_start();

//if the cookie is still valid, re-create the session
if($_COOKIE['loggedin']) {
  $_SESSION['loggedin'] = true;
}
//security! if the user is logged in
if(! $_SESSION['loggedin']) {
  //send them back to the login
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Secret!</title>
  </head>
  <body>

    <h1>You are on the secret page!</h1>

    <a href="login.php?action=logout">Log Out</a>
    <br>
    <img src="http://placeimg.com/500/500">

  </body>
</html>
