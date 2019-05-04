<?php include '../database/connection.php' ?>
<?php
  session_start ();
  if (isset($_REQUEST['submit-button-entry'])) {
    $login = $_REQUEST['admin-login'];
    $pass = $_REQUEST['admin-pass'];

    $pass_hash = hash('md5', $pass);
    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$pass_hash'";

    $result = mysql_query($query);

    if (mysql_fetch_array($result, MYSQL_ASSOC)) {
      $_SESSION['login'] = 1;
    }
  }

  if (!$_SESSION['login']) die ('Требуется учетная запись администратора');

  if (isset($_POST['submit-button'])) {

    if(isset($_FILES['post_title_img'])){
      $errors= array();
      $file_name = $_FILES['post_title_img']['name'];
      $file_size =$_FILES['post_title_img']['size'];
      $file_tmp =$_FILES['post_title_img']['tmp_name'];
      $file_type=$_FILES['post_title_img']['type'];
      if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../images/".$file_name);
      } else {
        print_r($errors);
      }
    }

    $post_date = date("y.m.d");
    $post_title_img = $file_name;
    $post_title = $_REQUEST['post_name'];
    $post_section = $_REQUEST['post_section'];
    $post_short = $_REQUEST['post_short'];
    $post_content = $_REQUEST['post_content'];
    $post_visitors = 0;

    $query = "INSERT INTO posts (id, post_date, post_title_img, post_title, post_section, post_short, post_content, post_visitors) VALUES ('NULL', '$post_date', '$file_name', '$post_title', '$post_section', '$post_short', '$post_content', '$post_visitors')";
		$result = mysql_query($query);

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="admin.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Admin</title>
</head>
<body>
  <div class="header">
    <div class="container container-header">

      <div class="container-title">
        <span class="title">Blog about cycling</span>
        <img src="../images/headericon.png" alt="Icon" class="title-icon">
      </div>
      <div style="margin-bottom: 10px;">
        <span style="font-size: 20px;">Admin</span>
      </div>

      <?php @include 'admin-menu.php' ?>

    </div>
  </div>
  <div class="main">
    <div class="container container-main">
      <?php @include 'add_post.php' ?>
    </div>
  </div>
</body>
</html>
