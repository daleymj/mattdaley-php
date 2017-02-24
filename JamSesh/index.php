<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jam Sesh</title>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<!-- <link rel="alternate" type="application/rss+xml" href="rss.php"> -->
  </head>

  <body>
    <header>
      <h1><a href="index.php"><img src="images/logo.png" alt="logo"></a></h1>
    </header>

    <aside class="callout">
      <h2>Stuff</h2>
      <p>Stuff</p>
      <p>Stuff</p>
    </aside>

    <main>
      <form action="" method="post" novalidate>

      <label for="the_name">Name:</label>
      <input type="text" name="name" id="the_name" value="">

      <label for="the_email">Email:</label>
      <input type="email" name="email" id="the_email" value="">

      <label for="the_phone">Phone Number</label>
      <input type="tel" name="phone" id="the_phone" value="">

      <label>
        Musician
        <input type="checkbox" name="Musician" value="true" class="account">
        Band
        <input type="checkbox" name="Band" value="true" class="account">
        Fan
        <input type="checkbox" name="Fan" value="true" class="account">
      </label>

      <label>
        <input type="checkbox" name="terms" value="true" class="terms">
        I agree to the Terms of Service and the Privacy Policy.
      </label>

      <input type="submit" value="Sign Up">
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
