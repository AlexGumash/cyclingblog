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

    $post_content = str_replace("'", '"', $post_content);
    $post_short = str_replace("'", '"', $post_short);
    $post_visitors = 0;

    $query = "INSERT INTO posts (id, post_date, post_title_img, post_title, post_section, post_short, post_content, post_visitors) VALUES ('NULL', '$post_date', '$file_name', '$post_title', '$post_section', '$post_short', '$post_content', '$post_visitors')";
		$result = mysql_query($query);
    if (!$result) {
      echo mysql_error();
    }
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
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=vjrxxkm7nqxh4y8r0xn6a4sg3fpa2bujpv3aar7w78wx8x3k"></script>
  <script>
  tinymce.init({
    selector: ".post-content",  // change this value according to your HTML
    plugins: 'autoresize fullpage searchreplace advcode visualblocks visualchars fullscreen image link media mediaembed codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help formatpainter mentions linkchecker',
    toolbar: 'formatselect | bold italic strikethrough forecolor backcolor formatpainter | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
    autoresize_bottom_margin: 70
  });
  tinymce.init({
    selector: ".post-short",  // change this value according to your HTML
    plugins: 'autoresize ',
    toolbar: 'bold italic forecolor backcolor ',
    width: '500px',
    menubar: false
  });
  </script>
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
