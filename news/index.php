<?php
  require('../header.php'); ?>

<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-1 has-text-centered">
        <span class="roy-title-underline">News</span>
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <?php
    $group = 'roy';

    $json = json_decode(file_get_contents('http://nanoscience.ucf.edu/api/v2/news'));
    date_default_timezone_set('America/New_York');
    ?>

    <div>
    <?php
      $year_index = array();
      $month_index = array();
      foreach ($json as $post) {

        // small bug since php sees 0 == false and stringpos returns position of
        // string which sometimes is 0. Fixed with exact evaluation !==
        if (strpos($post->groups, $group) !== false) {

          // Post year header if it's not there yet
          $year = date('Y', strtotime($post->postdate));
          if (array_search($year, $year_index) === false) {
            ?>
            </div>
            <br><br><br>
            <h2 class="title is-4"><?=$year?></h1>
            <hr>
            <div>
            <?php
            array_push($year_index, $year);
          }

          // Post month header if not there yet
          $month = date('F', strtotime($post->postdate));
          if (array_search($month, $month_index) === false) {
            ?>

            </div>
            <br><br>
            <h3 class="title is-5"><?=$month?></h1>
            <div>
            <?php
            array_push($month_index, $month);
          }
          echo '<p>- ' . $post->content . '</p>';
        }
      }
    ?>
    </div>
  </div>
</section>

<?php
  require('../footer.php'); ?>
