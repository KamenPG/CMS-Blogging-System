<?php include "includes/db.php"; global $connect; ?>

<?php include "includes/header.php"; ?>

    <!-- Navigation -->

    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <?php include "includes/searchCat.php" ?>

              </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>
