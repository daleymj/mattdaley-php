<?php require('loginparser.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Log Into Your Account</title>
    <link rel="stylesheet" href="admin/css/admin-style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  </head>
  <body class="login">

    <!-- <pre>
    <?php
    //Lets just look at the post array
    print_r($_POST);
    ?>
    </pre> -->

    <h1>Log In to Your Account</h1>

    <?php
    echo $feedback;
    // echo 'Username is: ' . $username . '<br>';
    // echo 'Password is: ' . $password;
    ?>

    <form action="login.php" method="post">

      <label for="the_username">Username</label>
      <input type="text" name="username" id="the_username">

      <label for="the_password">Password</label>
      <input type="password" name="password" id="the_password">

      <input type="submit" value="Log In">

      <input type="hidden" name="did_login" value="true">

    </form>

  </body>
</html>
