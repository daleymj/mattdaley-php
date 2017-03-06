<?php
require('loginparser.php');
$page = 'login';
include('header.php');
?>

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

      <input class="submit" type="submit" value="Log In">

      <input type="hidden" name="did_login" value="true">

    </form>

  </body>
</html>
