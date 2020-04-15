<?php
  include '../libs/Database.php';
  include '../libs/config.php';
  include '../functions/function.php';

  // Creating Database Object

  $db = new Database;

 // Selecting Category   
  $sql = "SELECT * FROM categories";
  $run = $db->select($sql);

//   Inserting
  if(isset($_POST['submit'])){
    
    $title   = mysqli_real_escape_string($db->conn, $_POST['title']);
    $catid   = mysqli_real_escape_string($db->conn, $_POST['catid']);
    $author  = mysqli_real_escape_string($db->conn, $_POST['author']);
    $tags    = mysqli_real_escape_string($db->conn, $_POST['tags']);
    $content = mysqli_real_escape_string($db->conn, $_POST['content']);

    if($title == '' || $catid == '' || $author == '' || $tags == '' || $content == ''){
        echo "<script>alert('All fields are mandatory.')</script>";
    }else{
        $insert = "INSERT INTO posts(category_id, title, content, author, tags)
                   VALUES('$catid','$title','$content','$author','$tags')";

        $run = $db->insert($insert);
        
    }

  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Add Post</title>

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
        <a class="nav-link" href="">Add Category</a>
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
     
            <!--BLOG HEADING ENDS HERE-->

    <main role="main" class="container">
    <div class="row">
    <div class="col-md-12 blog-main">
    
    <h3>Add Post:</h3>
    <hr>
    <form action="add_post.php" method="post">
    <div class="form-group">
        <label>Post Title:</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title">
    </div>

    <div class="form-group">
    <label >Select Category</label>
    <select class="form-control" name="catid">
      <option>Category</option>
      <?php
        while ($cat = $run->fetch_assoc()){
      ?>
      <option value="<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></option>
      <?php } ?>
    </select>
    
    <div class="form-group">
        <label>Author Name:</label>
        <input type="text" class="form-control" name="author" placeholder="Author Name">
    </div>

    <div class="form-group">
        <label>Post Content:</label>
        <textarea name="content" class="form-control" rows="3"  placeholder="Enter Content"></textarea>
    </div>
    
    <div class="form-group">
        <label>Tags:</label>
        <input type="text" class="form-control" name="tags" placeholder="Enter Tag">
    </div>
  
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
    <a href="index.php" class="btn btn-info">Cancel</a>
</form>
    
      </div><!-- /.blog-post -->
      