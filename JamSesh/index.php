<?php
	# connect
	require('db-config.php');
	# use _once on function definitions to prevent duplicates
	include_once('functions.php');
  include('register-parser.php');
  $page = 'home';
	# get the doctype and header area
	include('header.php');
 ?>


    <aside class="callout">
      <h2><img src="images/rolling.png" alt="rolling stone"></a></h2>
      <p>More than 1.5 Million Users!!!</p>
      <p>“#1 Social Media Site for Musicians!”</p>
      <p>-Kerrang Magazine!-</p>
    </aside>

    <main>
      <?php show_feedback($feedback, $errors ) ?>
      <form action="index.php" method="post" novalidate>

      <label for="the_name">Name:</label>
      <input type="text" name="name" id="the_name">

      <label for="the_email">Email:</label>
      <input type="email" name="email" id="the_email">

      <label for="the_password">Password:</label>
      <input type="password" name="password" id="the_password">

      <label for="the_zip">Zip Code:</label>
      <input type="text" name="zip_code" id="the_zip">

      <p>What type of account would you like?</p>

      <fieldset>
        <label class="account">
          Musician <br>
          <input type="radio" name="account_type" value="1">
        </label>
        <label class="account">
          Band <br>
          <input type="radio" name="account_type" value="2" class="account">
        </label>
        <label class="account">
          Fan <br>
          <input type="radio" name="account_type" value="3" class="account">
        </label>
      </fieldset>

      <label class="terms">
        <input type="checkbox" name="policy" value="1">
        <a href="#">I agree to the Terms of Service and the Privacy Policy.</a>
      </label>

      <input type="submit" value="Sign Up" class="submit">
      <input type="hidden" name="did_register" value="true">

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
