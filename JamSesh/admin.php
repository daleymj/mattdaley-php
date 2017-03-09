<?php
	# connect
	require('db-config.php');
	# use _once on function definitions to prevent duplicates
	include_once('functions.php');
  include('register-parser.php');
  $page = 'admin';
	# get the doctype and header area
	include('header.php');
 ?>

		<h1>Welcome</h1>
    <aside>
			<nav role="navigation">
			  <ul class="main">
			    <li class="dashboard"><a href="admin.php">Dashboard</a></li>
			    <li class="write"><a href="admin.php">Write Post</a></li>
			    <li class="edit"><a href="admin-update.php">Edit Profile</a></li>
					<?php if(IS_ADMIN) { ?>
			    <li class="comments"><a href="admin.php">Comments</a></li>
			    <li class="users"><a href="admin.php">Manage Users</a></li>
					<?php } //end if is admin ?>
			  </ul>
			</nav>
    </aside>

    <main>
			<form class="search" action="search.php" method="get">
				<label for="the_keywords">Search:</label>
				<input type="search" name="keywords" id="the_keywords">
				<input class="search" type="submit" value="Go" class="search-button">
			</form>
    </main>

		<?php
		# get the footer and close the open body and html tags
		include('footer.php');
		?>
