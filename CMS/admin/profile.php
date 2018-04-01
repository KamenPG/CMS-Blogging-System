<?php include "includes/admin_header.php" ?>

<?php

if (isset($_SESSION['username'])) {

  $username = $_SESSION['username'];

  $query = "SELECT * FROM users WHERE username = '{$username}' ";

  $select_user_profile_query = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($select_user_profile_query)) {

    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];

  }
}

 ?>

 <?php

 if (isset($_POST['update_profile'])) {

   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $user_role = $_POST['user_role'];
   $username = $_POST['username'];
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];

   $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

   $query = "UPDATE users SET ";
   $query .="user_firstname = '{$user_firstname}', ";
   $query .="user_lastname = '{$user_lastname}', ";
   $query .="user_role = '{$user_role}', ";
   $query .="username = '{$username}', ";
   $query .="user_email = '{$user_email}', ";
   $query .="user_password = '{$password}' ";
   $query .="WHERE user_id = {$user_id} ";

   $update_user = mysqli_query($connection, $query);

   confirmQuery($update_user);

 }


  ?>

<div id="wrapper">

<div id="page-wrapper">

<div class="container-fluid">

<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">

        <h1 class="page-header">
            Profile
        </h1>

        <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="title">First Name</label>
          <input type="text" class="form-control" name="user_firstname" value="<?php echo "$user_firstname"?>">
        </div>

        <div class="form-group">
          <label for="title">Last Name</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo "$user_lastname"?>">
        </div>

        <div class="form-group">
          <select name="user_role" id="">
            <option value="Subscriber"><?php echo "$user_role"; ?></option>

            <?php

            if ($user_role == 'Admin') {

              echo "<option value='Subscriber'>Subscriber</option>";

            }

            else  {

              echo "<option value='Admin'>Admin</option>";

            }
             ?>

          </select>
        </div>

        <!--
        <div class="form-group">
          <label for="post_image">Post Image</label>
          <input type="file" name="post_image">
        </div> -->

        <div class="form-group">
          <label for="post_tags">Username</label>
          <input type="text" class="form-control" name="username" value="<?php echo "$username"?>">
        </div>

        <div class="form-group">
          <label for="post_content">Email</label>
          <input type="email" class="form-control" name="user_email" value="<?php echo "$user_email"?>">
        </div>

        <div class="form-group">
          <label for="post_content">Password</label>
          <input type="password" class="form-control" name="user_password" value="<?php echo "$user_password"?>">
        </div>

        <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_profile"  value="Update Profile">
        </div>

        </form>

       </div>
      </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>
