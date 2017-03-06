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
      <div class="rolling">
      	<img src="images/rolling.png" alt="rolling stone">
			</div>
      <p>More than 1.5 Million Users!!!</p>
      <p>“#1 Social Media Site for Musicians!”<br>-Kerrang Magazine!-</p>
    </aside>

		<form class="search" action="search.php" method="get">
			<label for="the_keywords">Search:</label>
			<input type="search" name="keywords" id="the_keywords">
			<input class="search" type="submit" value="Go" class="search-button">
		</form>

    <main>
      <?php show_feedback($feedback, $errors ) ?>
      <form class="register" action="index.php" method="post" novalidate>

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
        <a href="policy.php"><small>I agree to the Terms of Service and the Privacy Policy.</small></a>
      </label>

      <input type="submit" value="Sign Up" class="submit">
      <input type="hidden" name="did_register" value="true">

      </form>
    </main>

		<?php
		# get the footer and close the open body and html tags
		include('footer.php');
		?>
