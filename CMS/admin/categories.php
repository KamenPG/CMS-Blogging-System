<?php include "includes/admin_header.php" ?>

<div id="wrapper">

<div id="page-wrapper">

<div class="container-fluid">

<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>


  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">

          <h1 class="page-header">
              Categories
          </h1>
        <div class="col-xs-6">

      <?php
      //CREATING A CATEGORY
      create_categories()
      ?>

       <form action="" method="post">

         <div class="form-group">
           <label for="cat-title">Category Title</label>
           <input class="form-control" type="text" name="cat_title" value="">
         </div>

         <div class="form-group">
           <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
         </div>

       </form>

       <?php

       if (isset($_GET['edit'])) {

         $cat_id = $_GET['edit'];
         //UPDATE QUERY
          include "includes/update_categories.php";
       }

        ?>
      </div>
        <div class="col-xs-6">

           <table class="table table-bordered table-hover" >
            <thead>
              <tr>
                <th>Id</th>
                <th>Category Title</th>
              </tr>
            </thead>
            <tbody>
              </div>



          <?php
          //FINDING A CATEGORY
          find_categories()
          ?>

          <?php
          //REMOVING A CATEGORY
          delete_categories();
          ?>

           </tbody>
          </table>



       </div>


      </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>
