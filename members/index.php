<?php
  require('../header.php'); ?>

<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-1 has-text-centered">
        <span class="roy-title-underline">Members</span>
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-size-5">
        <h2 class="title is-3">
          Principal Investigator:<br /><br />
          Tania Roy
        </h2>
        <p><strong>Assistant Professor</strong></p>
        <p><em>NanoScience Technology Center</em></p>
        <p><em>Department of Electrical and Computer Engineering,</em> </p>
        <p><em>Department of Materials Science and Engineering</em></p>
        <p><em>Department of Physics</em> </p>
        <p><em>BRIDG</em></p>

        <br />
        <br />
        <br />

        <p><strong>Postdoctoral Scholar</strong> University of California, Berkeley 2014-16</p>
        <p><strong>Postdoctoral Fellow</strong> Georgia Institute of Technology 2011-14</p>
        <p><strong>Ph.D.</strong> Vanderbilt University  2006-2011</p>
        <p><strong>B.E. (Hons.)</strong> Birla Institute of Technology and Science, Pilani, India 2002-06</p>

      </div>
      <div class="column has-text-centered">
        <img src="../static/images/members/roy.jpg" />
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <?php
    $group = 'roy';
    $json = json_decode(file_get_contents('http://nanoscience.ucf.edu/api/v2/group'));

    $title_index= array();
    foreach($json as $member) {
      $name = $member->firstName . " " . $member->lastName;

      if (strpos($member->groups, $group) !== false) {
        if (!$member->alumni) {
          // display the section header (member title) if the member is part of a new grouping
          if (array_search($member->title, $title_index) === false) {
            ?>
            <h2 class="title is-3 roy-members"><?=$member->title?>:</h2>
            <?php
            array_push($title_index, $member->title);
          }

          echo '<p class="is-size-5">' . $name . '</p>';
        }
      }
    }
    ?>
  </div>
</section>



<?php
  require('../footer.php'); ?>
