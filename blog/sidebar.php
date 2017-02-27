<aside class="sidebar">
  <nav>
    <ul>
      <li><a href="admin/">Admin Panel</a></li>
      <li><a href="register.php">Sign Up</a></li>
    </ul>
  </nav>
  <section id="search_form_wrap">
    <form class="form-search" action="search.php" method="get">
      <label for="the_keywords">Search:</label>
      <input type="search" name="keywords" id="the_keywords">
      <input type="submit" value="Go" class="search-button">
    </form>
  </section>
  <section id="sidbar_wrap">
    <h2>Recent Posts</h2>
    <?php
    //get the latests 5 published posts and their comment count
    //TODO: make this show the posts that have 0 comments
    $query = "SELECT posts.title, posts.post_id
              FROM posts
              WHERE posts.is_published = 1
              ORDER BY posts.date DESC
              LIMIT 5";
    //run it
    $result = $db->query($query);
    //check it
    if ( $result->num_rows >=1 ) {
      ?>
      <ul>
        <?php
        //loop it
        while( $row = $result->fetch_assoc() ){
          ?>
          <li><a href="single.php?post_id=<?php echo $row['post_id'] ?>"><?php echo $row['title']; ?>
          </a>
          - <?php count_comments($row['post_id']); ?>
          </li>
          <?php
        }//end while
        //free it
        $result->free();
        ?>
      </ul>
      <?php }//end if there are posts
      else{
        echo 'There are currently no posts to show. Please check back later.';
      }
      ?>
    </section>
    <section>
      <h2>Categories</h2>
      <?php
      //get all category names in alphabetical order
      $query = "SELECT name, category_id
                FROM categories
                WHERE category_id = category_id
                GROUP BY category_id
                ORDER BY name ASC
                LIMIT 5";
      //run it
      $result = $db->query($query);
      //check it
      if ( $result->num_rows >=1 ) {
        ?>
        <ul>
          <?php
          //loop it
          while( $row = $result->fetch_assoc() ){
            ?>
            <li><?php echo $row['name']; ?>
            (<?php count_posts($row['category_id']); ?>)
            </li>
            <?php
          }//end while
          //free it
          $result->free();
          ?>
        </ul>
        <?php }//end if there are categories
        else{
          echo 'There are currently no categories to show. Please check back later.';
        }
        ?>
      </section>
      <section>
        <h2>Links</h2>
        <?php
        //get all links in alphabetical order
        $query = "SELECT title, url
        FROM links
        ORDER BY title ASC
        LIMIT 5";
        //run it
        $result = $db->query($query);
        //check it
        if ( $result->num_rows >=1 ) {
          ?>
          <ul>
            <?php
            //loop it
            while( $row = $result->fetch_assoc() ){
              ?>
              <li><a href="<?php echo $row['url']; ?>"><?php echo $row['title']; ?></a></li>
              <?php
            }//end while
            //free it
            $result->free();
            ?>
          </ul>
          <?php }//end if there are links
          else{
            echo 'There are currently no links to show. Please check back later.';
          }
          ?>
        </section>
      </aside>
