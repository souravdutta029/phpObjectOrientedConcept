<?php
  include '../libs/Database.php';
  include '../libs/config.php';
  include '../functions/function.php';

  // Creating Database Object

  $db = new Database;

  $sql = "SELECT * FROM posts ORDER BY id DESC";
  $posts = $db->select($sql);

  $sql1 = "SELECT * FROM categories";
  $cat = $db->select($sql1);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Admin Panel</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/blog/"> -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      body{
        font-family: 'Roboto', sans-serif;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        
      </div>
      <div class="col-4 text-center">
        
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        
        
      </div>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<!--NAVBAR STARTS HERE-->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_post.php">Add Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_category.php">Add Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">View Post</a>
      </li>
    </ul>
    <a class="nav-link" href="register.php"> Register User</a>
    <a class="nav-link" href="login.php">Login</a>
    <a class="nav-link" href="logout.php">Logout</a>
  </div>
</nav>   <!--NAVBAR ENDS HERE-->


 <br>
 <br> 

<main role="main" class="container">     
      <div class="blog-header">    <!--BLOG HEADING STARTS HERE-->
      <h4 class="blog-title">
        Admin Panel
      </h4>
      </div>        <!--BLOG HEADING ENDS HERE-->

<br>
<br>
<br>
  <div class="row">
    <div class="col-md-12 blog-main">
      <?php
        if(isset($_GET['msg'])){
          echo "<div class='alert alert-success alert-dismissible fade show'>".$_GET['msg']."</div>";
        }
      ?>
    <table class="table table-striped">
    <thead>
    <tr>
        <td colspan="4" class="text-center"><h4>Manage Posts</h4></td>
    </tr>
    <tr>
      <th scope="col">Post Id</th>
      <th scope="col">Post Title</th>
      <th scope="col">Post Author</th>
      <th scope="col">Post Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($row = $posts->fetch_assoc()){
    ?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
      <td><?php echo $row['author']; ?></td>
      <td><?php echo format_date($row['date']); ?></td>
    </tr>
      <?php } ?>
  </tbody>
</table>
<br>
<br>
<table class="table table-striped">
    <thead>
    <tr>
        <td colspan="4" class="text-center"><h4>Manage Categories</h4></td>
    </tr>
    <tr>
      <th scope="col">Category Id</th>
      <th scope="col">Category Title</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($row1 = $cat->fetch_assoc()){
    ?>
    <tr>
      <th scope="row"><?php echo $row1['id']; ?></th>
      <td><a href="edit_cat.php?id=<?php echo $row1['id']; ?>"><?php echo $row1['title']; ?></a></td>
    </tr>
      <?php } ?>
  </tbody>
</table>
      </div><!-- /.blog-post -->
      