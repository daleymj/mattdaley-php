<?php
//define your variables at the top but don't echo anything before the doctype
$username = 'Matt';
$favoritenumber = 15;
$favoritenumber++;
$favoritenumber += 10;
$favoritenumber = $favoritenumber + 1;

//define a really simple function
function todaysDate(){
  echo date('l, F j, Y');
  echo ' at ';
  echo date('h:i:s');
}

//a function to convert ugly timestamps to human friendly dates
function convertTimestamp($ugly){
  $date = new DateTime($ugly);
  return $date->format('l, F jS, Y');
}
function addTen($number){
  return $number += 10;
}

$num = 7;
function add100($number){
  return $number += 100;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My first PHP demo</title>
    <style media="screen">
      body {
        color: blue;
      }
      h2 {
        color: orange;
      }
      .menu {
        background-color: orange;
      }
    </style>
  </head>
  <body>
    <h1>All normal HTML rules apply</h1>

    <?php
    include('nav.php');
    ?>

    <?php
    echo 'Hello, ' . $username . ',<br>';
    echo ' Your favorite number is now ' . $favoritenumber . '<br>';
    ?>

    <?php
    todaysDate() . '<br>';
    ?>

    <?php
    echo convertTimestamp('2017-02-03') . '<br>';
    ?>

    <?php
    echo addTen(13);
    ?>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <?php
    echo add100($num);
    ?>

  </body>
</html>
