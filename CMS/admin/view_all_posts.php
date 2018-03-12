<table class="table table-bordered table-hover">
  <thead>
    <th>Id</th>
    <th>Author</th>
    <th>Title</th>
    <th>Category</th>
    <th>Status</th>
    <th>Images</th>
    <th>Tags</th>
    <th>Comments</th>
    <th>Views</th>
    <th>Date</th>
    </tr>
  </thead>
  <tbody>

    <?php

    $query = "SELECT * FROM posts ";
    $select_posts = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_posts)) {
          $post_id = $row['post_id'];
          $post_author = $row['post_author'];
          $post_title = $row['post_title'];
          $post_category_id = $row['post_category_id'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_tags = $row['post_tags'];
          $post_comment_count = $row['post_comment_count'];
          $post_date = $row['post_date'];
          $post_view_count = $row['post_view_count'];


          echo "<tr>";
          echo "<td>$post_id</td>";
          echo "<td>$post_author</td>";
          echo "<td>$post_title</td>";
          echo "<td>$post_category_id</td>";
          echo "<td>$post_status</td>";
          echo "<td><img height='200' width='200' class='img-responsive' src='../images/$post_image' alt='image'></td>";
          echo "<td>$post_tags</td>";
          echo "<td>$post_comment_count</td>";
          echo "<td>$post_view_count</td>";
          echo "<td>$post_date</td>";
      }

     ?>
  </tbody>
</table>
