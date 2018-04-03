<?php include "includes/db.php"; global $connect; ?>

<?php include "includes/header.php"; ?>

    <!-- Navigation -->

    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <br>
            <div class="col-md-8">

              <?php include "includes/search.php" ?>

              </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

      <ul class="pager">

      <?php

      for ($i=1; $i <= $count ; $i++) {
          if ($i == $page) {
              echo "<li><a class='active_link' href='index.php?page={$i}'>$i</a></li>";
          } else {
              echo "<li><a href='index.php?page={$i}'>$i</a></li>";
          }
      }


       ?>

      </ul>

        <?php include "includes/footer.php"; ?>
