<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jam Sesh</title>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<!-- <link rel="alternate" type="application/rss+xml" href="rss.php"> -->
  </head>

  <body id="home">
    <header>
      <h1><a href="index.php"><img src="images/logo.png" alt="logo"></a></h1>
      <ul>>>
        <li><a href="#">Log In</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
    </header>

    <aside class="callout">
      <h2><img src="images/rolling.png" alt="rolling stone"></a></h2>
      <p>More than 1.5 Million Users!!!</p>
      <p>“#1 Social Media Site for Musicians!”</p>
      <p>-Kerrang Magazine!-</p>
    </aside>

    <main>
      <form action="" method="post" novalidate>

      <label for="the_name">Name:</label>
      <input type="text" name="name" id="the_name">

      <label for="the_email">Email:</label>
      <input type="email" name="email" id="the_email">

      <label for="the_phone">Password:</label>
      <input type="text" name="password" id="the_password">

      <label for="the_phone">Zip Code:</label>
      <input type="text" name="zip code" id="the_zip">

      <p>What type of account would you like?</p>

      <fieldset>
        <label class="account">
          Musician <br>
          <input type="checkbox" name="Musician" value="true">
        </label>
        <label class="account">
          Band <br>
          <input type="checkbox" name="Band" value="true" class="account">
        </label>
        <label class="account">
          Fan <br>
          <input type="checkbox" name="Fan" value="true" class="account">
        </label>
      </fieldset>

      <label class="terms">
        <input type="checkbox" name="terms" value="true" class="terms">
        <a href="#">I agree to the Terms of Service and the Privacy Policy.</a>
      </label>

      <input type="submit" value="Sign Up" class="submit">
      <input type="hidden" name="did_send" value="true">

      </form>
    </main>

    <footer>
      <small>&copy 2017 Matt Daley</small>
      <ul>
        <li><a href="#"><img src="images/face.png" alt="facebook"></a></li>
        <li><a href="#"><img src="images/twit.png" alt="twitter"></a></li>
        <li><a href="#"><img src="images/insta.png" alt="instagram"></a></li>
        <li><a href="#"><img src="images/rss.png" alt="rss"></a></li>
      </ul>
    </footer>
  </body>
</html>
