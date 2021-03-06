<?php
session_start();
//hide notices because they are ugly
error_reporting(E_ALL & ~E_NOTICE);
require('db-config.php');
include_once('functions.php');

//begin parsing the form if the user submitted it
if($_POST['did_login']) {
  //clean the values the user typed in:
  $username = clean_string($_POST['username']);
  $password = clean_string($_POST['password']);

  if(strlen($username) >= 5 AND strlen($username) <= 50 AND strlen($password) >= 8) {
    //look up this user in the DB
    $password = sha1($password . SALT);
    $query = "SELECT user_id, is_admin
              FROM users
              WHERE username = '$username'
              AND password = '$password'
              LIMIT 1";
    $result = $db->query($query);

    if($result->num_rows == 1) {
      //SUCCESS
      //remember the user for 1 week
      $security_key = sha1(microtime() . SALT);
      //store it in the DB for this user
      $row = $result->fetch_assoc();
      $user_id = $row['user_id'];

      $query = "UPDATE users
                SET security_key = '$security_key'
                WHERE user_id = $user_id
                LIMIT 1";
      $result = $db->query($query);

      $expiration = time() + 60 * 60 * 24 * 7;

      setcookie('security_key', $security_key, $expiration);
      $_SESSION['security_key'] = $security_key;

      setcookie('user_id', $user_id, $expiration);
      $_SESSION['user_id'] = $user_id;

      //make sure the query worked
      if(! $result) {
        die($db->error);
      }
      //send to secret page
      header('location:admin.php');
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

  //remove the security_key from the DB
  $user_id = $_SESSION['user_id'];
  $query = "UPDATE users
            SET security_key = ''
            WHERE user_id = $user_id
            LIMIT 1";
  $result = $db->query($query);

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
  setcookie('$security_key', '', time() - 9999);
  setcookie('$user_id', '', time() - 9999);
}//end of log out
