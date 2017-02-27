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

//salt for making our passwords stronger. keep this a secret!
define('SALT', 'jl3e24y]8h.,qouiw;3gy134-89ph1trf0p0p0p=0p0pg13ljf239p8');

error_reporting(E_ALL & ~E_NOTICE);
