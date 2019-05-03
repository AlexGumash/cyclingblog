<?php include '../database/connection.php' ?>
<?php
  if (isset($_POST['submit-button'])) {

    if(isset($_FILES['post_title_img'])){
      $errors= array();
      $file_name = $_FILES['post_title_img']['name'];
      $file_size =$_FILES['post_title_img']['size'];
      $file_tmp =$_FILES['post_title_img']['tmp_name'];
      $file_type=$_FILES['post_title_img']['type'];
      if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../images/".$file_name);
      }
    }

    $post_date = date("y.m.d");
    $post_title_img = $file_name;
    $post_title = $_REQUEST['post_name'];
    $post_section = $_REQUEST['post_section'];
    $post_short = $_REQUEST['post_short'];
    $post_content = $_REQUEST['post_content'];

    $id = $_REQUEST['id'];
    $query = "UPDATE posts SET post_date = '$post_date', post_title_img = '$post_title_img', post_title = '$post_title', post_section = '$post_section', post_short = '$post_short', post_content = '$post_content' WHERE id = '$id'";

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
  <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
  <script type="text/javascript">
    function deletePost(id){
      console.log(id);
      $.ajax({
        type: "post",
        url: "delete.php",
        data: {post_id: id}
      }).done(function(result){
        console.log(result);
        location.reload();
      })
    }
  </script>
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

      <div class="posts">
        <?php
          $query = "SELECT * FROM posts";
          $res = mysql_query($query);

          while ($post = mysql_fetch_array($res, MYSQL_ASSOC)) {
        ?>

        <div class="post">
          <div class="post_title">
            <?php echo $post['post_title'] ?>
          </div>
          <div class="post_short">
            <?php echo $post['post_short'] ?>
          </div>
          <div class="post_date">
            <?php echo $post['post_date'] ?>
          </div>
          <div class="icons">
            <div class="icon icon-edit">
              <a href="refactor_post.php?id=<?php echo $post['id'] ?>">
                <img src="../images/edit.png" alt="edit" class="icon-img">
              </a>
            </div>
            <div class="icon icon-delete" onClick="deletePost(<?php echo $post['id'] ?>)">
              <img src="../images/delete.png" alt="delete" class="icon-img">
            </div>
          </div>
        </div>

        <?php
          }
        ?>

      </div>
    </div>
  </div>
</body>
</html>
