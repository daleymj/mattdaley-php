<?php
session_start();
//hide notices because they are ugly
error_reporting(E_ALL & ~E_NOTICE);

//begin parsing the form if the user submitted it
if($_POST['did_login']) {
  //Temporary : the correct credentials for logging in. this will be replaced with DB stuff
  $correct_username = 'daleymj';
  $correct_password = 'fuckoff';

  //the values the user typed in:
  $username = trim(strip_tags($_POST['username']));
  $password = trim(strip_tags($_POST['password']));

  if(strlen($username) >= 5 AND strlen($username) <= 25 AND strlen($password) >= 5) {
    //check to see if they matched both the UN and PW
    if($username === $correct_username AND $password === $correct_password) {
      //remember the user for 1 week
      setcookie('loggedin', true, time() + 60 * 60 * 24 * 7);
      $_SESSION['loggedin'] = true;
      //send to secret page
      header('location:secretpage.php');
    }else {
      //show an Error
      $feedback = 'Your username or password is incorrect!!!';
    }//end if and else
  }else {
    $feedback = 'Username or password are not the right length.';
  }//end of validation
}//end of form parser

//is the user trying to log out?
if($_GET['action'] == 'logout') {

  //from php.net session_destroy docs
  // Unset all of the session variables.
  $_SESSION = array();

  // If it's desired to kill the session, also delete the session cookie.
  // Note: This will destroy the session, and not just the session data!
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }
  session_destroy();
  //make cookies expire
  setcookie('loggedin', '', time() - 9999);
}//end of log out
