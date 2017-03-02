<?php
//begin parser
if ( $_POST['did_register'] ) {
  //sanitize all user input data
  $username = clean_string( $_POST['name'] );
  $email = clean_string( $_POST['email'] );
  $password = clean_string( $_POST['password'] );
  $zip_code = clean_integer( $_POST['zip_code'] );
  $account_type = clean_integer( $_POST['account_type'] );
  $policy = clean_boolean( $_POST['policy'] );
  //validate the following*:
  $valid = 1;
  /*username wrong length*/
  if ( strlen($username) < 5 OR strlen($username) > 50 ) {
    $valid = 0;
    $errors['username'] = 'Choose a username between 5 and 50 characters long.';
  }else{
    /*username already taken*/
    $query = "SELECT username FROM users WHERE username = '$username' LIMIT 1";
    $result = $db->query($query);
    if ( $result->num_rows == 1 ) {
      $valid = 0;
      $errors['username'] = 'Sorry, that username is already in use. Choose another.';
    }
  }
  /*password wrong length*/
  if ( strlen($password) < 8 ) {
    $valid = 0;
    $errors['password'] = 'Your password needs to be at least 8 characters.';
  }
  /*email bad format*/
  if ( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    $valid = 0;
    $errors['email'] = 'Please provide a valid email.';
  }else{
    /*email already taken*/
    $query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $result = $db->query($query);
    if ( $result->num_rows == 1 ) {
      $valid = 0;
      $errors['email'] = 'That email is already registered.';
    }
  }
  if ( $account_type < 1 OR $account_type > 3 ) {
    $valid = 0;
    $errors['account_type'] = 'Please choose an account type.';
  }
  /*policy box not checked*/
  if ( $policy != 1 ) {
    $valid = 0;
    $errors['policy'] = 'Please agree to our terms before signing up.';
  }
  if ( $zip_code == '' ) {
    $valid = 0;
    $errors['zip_code'] = 'Please fill in your zip code.';
  }
  //if valid, add the user to the users table!
  if ( $valid ) {
    $password = sha1($password . SALT);
    $query = "INSERT INTO users ( username, password, email, is_admin, zip_code, account_type, date_joined )
              VALUES ( '$username', '$password', '$email', 0, $zip_code, $account_type, now() )";
    $result = $db->query($query);
    //if it worked, tell them to wait for confirmation, redirect to login
    if ( $db->affected_rows == 1 ) {
      $feedback = 'You are now signed up! You can log in!';
    }else{
      //if it failed, show the user feedback
      $feedback = 'Sorry, your account was not created. Try again later.';
    }
  }//end if valid
  else{
    $feedback = 'There where errors in the form submission, please fix the highlighted areas.';
  }
}//end parser
