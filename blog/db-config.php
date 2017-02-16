<?php
$host = 'localhost';
$username = 'mattdaley_blog';
$password = 'hRyCW6n5mSLu8jjx';
$database = 'mattdaley_blog';

//connect to database
$db = new mysqli($host, $username, $password, $database);

//check to make sure it worked
if($db -> connect_errno > 0) {
  die('Unable to connect to database.');
}
