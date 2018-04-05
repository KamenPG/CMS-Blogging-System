<?php include "includes/db.php"; global $connect; ?>

<?php include "includes/header.php"; ?>

<!-- Navigation -->

<?php include "includes/navigation_admin.php"; ?>

<!-- Page Content -->
<div class="container">

<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">

<?php

if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $tags  = mysqli_query($connection, $query);
    if (! $tags) {
        die("error" . mysqli_error($connection));
    } else {
        $count = mysqli_num_rows($tags);
        if ($count == 0) {
            echo "<h1>NO POSTS</h1>";
        } else {
            while ($row = mysqli_fetch_assoc($tags)) {
                $post_title   = $row['post_title'];
                $post_id      = $row['post_id'];
                $post_content = $row['post_content'];
                $post_date    = $row['post_date'];
                $post_author  = $row['post_author'];
                $post_image   = $row['post_image']; ?>

<hr>

    <?php
            } // end of while ($row = mysqli_fetch_assoc($tags))
        } // closing else of if ($count == 0) {
    } // closing else of if(!$tags)
} else {
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
        $the_post_author = $_GET['author'];
    }

    $query1 = "SELECT * FROM posts WHERE post_author = '{$the_post_author}'";
    $select_all_posts_query = mysqli_query($connection, $query1);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_id = $row['post_id'];
        $post_content = substr($row['post_content'], 0, 300); ?>


        <!-- First Blog Post -->
        <h2>
            <a href="post_admin.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
        </h2>
        <p class="lead">
            by <?php echo $post_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
        <hr>
        <a href="post_admin.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
        <hr>
        <p><?php echo $post_content ?></p>
        <a class="btn btn-primary" href="post_admin.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>

      <?php
    }
} ?>


  </div>

<!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar_admin.php" ?>

</div>
<!-- /.row -->

<hr>

<?php include "includes/footer.php"; ?>
