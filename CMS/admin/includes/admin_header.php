<?php ob_start() ?>
<?php session_start() ?>

<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "password";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {

  define(strtoupper($key), $value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

 ?>

 <?php

 function confirmQuery($result){

   global $connection;

   if (!$result) {

     die("QUERY FAILED ! ." . mysqli_error($connection));
   }


 }

  ?>

 <?php

 function create_categories(){

   if (isset($_POST['submit'])) {

     global $connection;

   $cat_title = $_POST['cat_title'];

   if ($cat_title=="" || empty($cat_title)) {

   echo "This field should not be empty !";
   }
   else {

   $query = "INSERT INTO categories(cat_title)";
   $query .= "VALUE('$cat_title') ";

   $create_category_query = mysqli_query($connection, $query);

   if (!$create_category_query) {

     die('QUERY FAILED' . mysqli_error($connection));
   }

   }

   }

 }

  ?>

  <?php
  function delete_categories(){

    if (isset($_GET['delete'])) {
      global $connection;

    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = $the_cat_id ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: categories.php");


    }
  }
   ?>

   <?php function find_categories(){
   global $connection;

   //FIND ALL CATEGORIES QUERY
   $query = "SELECT * FROM categories ";
   $select_categories = mysqli_query($connection, $query);

     while ($row = mysqli_fetch_assoc($select_categories)) {
       $cat_id = $row['cat_id'];
       $cat_title = $row['cat_title'];

     echo "<tr>";
     echo "<td>{$cat_id}</td>";
     echo "<td>{$cat_title}</td>";
     echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
     echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
     echo "<tr>";
       }
 }
    ?>

<?php

if (!isset($_SESSION['user_role'])) {
    header("Location: ../index.php");
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Center</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>

</head>

<body>
