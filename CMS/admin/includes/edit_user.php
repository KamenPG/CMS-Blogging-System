<?php

if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];
}

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_users_by_id)) {
    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $db_user_password = $row['user_password'];
}

?>

<?php

if (isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role = '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$hashed_password}' ";
    $query .="WHERE user_id = {$the_user_id} ";

    $update_post = mysqli_query($connection, $query);

    confirmQuery($update_post);

    echo "<div class=bg-success>User Updated: " . " " . "<a href='users.php'>View Users</a></div>";
}

 ?>

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
    <option value="<?php echo "$user_role"; ?>"><?php echo "$user_role"; ?></option>

    <?php

    if ($user_role == 'Admin') {
        echo "<option value='Subscriber'>Subscriber</option>";
    } else {
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
  <input type="password" class="form-control" name="user_password" value="<?php echo "$db_user_password"?>">
</div>

<div class="form-group">
  <input class="btn btn-primary" type="submit" name="edit_user"  value="Update User">
</div>

</form>
