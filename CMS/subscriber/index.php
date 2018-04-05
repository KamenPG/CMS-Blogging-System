<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <div id="page-wrapper">

          <?php

          $session = session_id();
          $time = time();
          $time_out_in_seconds = 60;
          $time_out = $time - $time_out_in_seconds;

         ?>

            <div class="container-fluid">

              <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome !
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>

                    </div>
                </div>


         </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>
