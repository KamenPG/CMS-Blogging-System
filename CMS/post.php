<?php include "includes/db.php"; global $connect; ?>

<?php include "includes/header.php"; ?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>

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

<h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
</h1>

<!-- First Blog Post -->
<h2>
    <a href="#"><?php echo $post_title ?></a>
</h2>
<p class="lead">
    by <a href="index.php"><?php echo $post_author ?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
<hr>
<img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
<hr>
<p><?php echo $post_content ?></p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>

    <?php
            } // end of while ($row = mysqli_fetch_assoc($tags))
        } // closing else of if ($count == 0) {
    } // closing else of if(!$tags)
} else {
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
    }

    $query1 = "SELECT * FROM posts WHERE post_id = $the_post_id";
    $select_all_posts_query = mysqli_query($connection, $query1);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content']; ?>
        <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1>

        <!-- First Blog Post -->
        <h2>
            <a href="#"><?php echo $post_title ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
        <hr>
        <p><?php echo $post_content ?></p>
        <hr>

      <?php
    }
} ?>

<!-- Comments Form -->
<div class="well">
    <h4><strong>Leave a Comment:</strong></h4>
    <br>
    <form action="" method="post" role="form">

      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="comment_author">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="comment_email">
      </div>

        <div class="form-group">
          <label for="comment">Your Comment</label>
            <textarea class="form-control" rows="3" name="comment_content"></textarea>
        </div>

        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

    </form>
</div>
<hr>
      <!-- Blog Comments -->

      <?php

      $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
      $query .= "AND content_status = 'approved' ";
      $query .= "ORDER BY comment_id DESC ";
      $select_comment_query =mysqli_query($connection, $query);
      if (!$select_comment_query) {

        die('Query Failed !' . mysqli_error($connection));
      }

      while ($row = mysqli_fetch_array($select_comment_query)) {

        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_author = $row['comment_author'];

        ?>

        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?=$comment_author?>
                    <small><?=$comment_date?></small>
                </h4>
                <?=$comment_content?>
            </div>
        </div>

<?php } ?>




      <?php


      if (isset($_POST['create_comment'])) {

          $the_post_id = $_GET['p_id'];
          $comment_author = $_POST['comment_author'];
          $comment_email = $_POST['comment_email'];
          $comment_content = $_POST['comment_content'];

          $query2 = "INSERT INTO comments
          (comment_post_id, comment_author, comment_email, comment_content, content_status, comment_date) VALUES
          ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

          $create_comment_query = mysqli_query($connection, $query2);

          $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";

          $update_comments_count = mysqli_query($connection, $query);



      }


       ?>

      <!-- Posted Comments -->

  </div>

<!-- Blog Sidebar Widgets Column -->

<?php include "includes/sidebar.php" ?>

</div>
<!-- /.row -->

<hr>

<?php include "includes/footer.php"; ?>
