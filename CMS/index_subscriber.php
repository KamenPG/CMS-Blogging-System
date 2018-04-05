<?php include "includes_subscriber/db.php"; global $connect; ?>

<?php include "includes_subscriber/header.php"; ?>

    <!-- Navigation -->

    <?php include "includes_subscriber/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <br>
            <div class="col-md-8">

              <?php include "includes_subscriber/search.php" ?>

              </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes_subscriber/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

      <ul class="pager">

      <?php

      for ($i=1; $i <= $count ; $i++) {
          if ($i == $page) {
              echo "<li><a class='active_link' href='index_sub.php?page={$i}'>$i</a></li>";
          } else {
              echo "<li><a href='index_sub.php?page={$i}'>$i</a></li>";
          }
      }


       ?>

      </ul>

        <?php include "includes/footer.php"; ?>
