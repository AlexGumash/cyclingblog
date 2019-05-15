<?php
  include 'database/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles/post.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Новые</title>
</head>
<body>
  <?php include 'usable/header.php' ?>
  <div class="main">
    <div class="container container-main">

      <a href="#" onclick="history.back();" style="color: black;">
        <div class="back-button">
          &#8592; вернуться
        </div>
      </a>

      <?php
        $post_id = $_REQUEST['post_id'];
        $query = "SELECT * FROM posts WHERE id = $post_id";
        $res = mysql_query($query);

        $post = mysql_fetch_array($res, MYSQL_ASSOC);

        $counter = $post['post_visitors'] + 1;
        $query = "UPDATE posts SET post_visitors = $counter WHERE id = $post_id";
        mysql_query($query);
      ?>
        <div class="post-container">
          <div class="post">

            <div class="container-post">
              <div class="post-header">
                <div class="post-header-item post-title">
                  <?php echo $post['post_title'] ?>
                </div>
                <div class="post-header-item post-date">
                  <?php echo $post['post_date'] ?>
                </div>
                <div class="post-header-item post-visitors">
                  <img src="images/eye.png" alt="Eye" style="height: 15px;">
                  <?php echo $post['post_visitors'] ?>
                </div>
              </div>

              <div class="post-content">
                <?php $src = $post['post_title_img'] ?>
                <img src="<?php echo "images/$src"; ?>" alt="post title image" class="post-title-image">
                <?php
                  echo $post['post_content'];
                ?>
              </div>

            </div>

          </div>
          <?php include 'usable/popular.php' ?>

        </div>
    </div>
  </div>
  <?php include 'usable/footer.php' ?>
</body>
