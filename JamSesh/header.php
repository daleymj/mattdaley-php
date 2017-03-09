<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Jam Sesh</title>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="alternate" type="application/rss+xml" href="rss.php">
  </head>

  <body id="<?php echo $page; ?>" class="container">
    <header>
      <div class="">
        <a href="index.php"><img src="images/logo.png" alt="logo"></a>
      </div>
      <ul>
        <?php if ($page != 'admin') { ?>
          <li><a href="admin.php">Home</a></li>
        <?php } ?>
        <?php if ($page != 'login' AND empty($_SESSION['user_id'])) { ?>
          <li><a href="login.php">Log In</a></li>
        <?php } ?>
        <?php if ($page != 'about') { ?>
          <li><a href="about.php">About Us</a></li>
        <?php } ?>
        <?php if ($_SESSION['user_id']) { ?>
          <li><a href="login.php?action=logout">Sign Out</a></li>
        <?php } ?>

      </ul>
    </header>
