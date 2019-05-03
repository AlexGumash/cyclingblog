<?php include '../database/connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Полезное</title>
</head>
<body>
  <?php include '../usable/header.php' ?>
  <div class="main">
    <div class="container container-main">

      <?php
        $query = "SELECT * FROM posts WHERE post_section = 'Полезное'";
        $res = mysql_query($query);

        while ($post = mysql_fetch_array($res, MYSQL_ASSOC)) {
      ?>
          <div class="post">
            <div class="post-img">
              <?php $img_src = '../images/' . $post['post_title_img'] ?>
              <?php echo "<img src=$img_src alt='Post icon' class='post-image'>"; ?>
            </div>

            <div class="container-post">
              <div class="post-header">
                <div class="post-header-item post-title">
                  <?php echo $post['post_title'] ?>
                </div>
                <div class="post-header-item post-date">
                  <?php echo $post['post_date'] ?>
                </div>
                <div class="post-header-item post-visitors">
                  <img src="../images/eye.png" alt="Eye" style="height: 15px;">
                  <?php echo $post['post_visitors'] ?>
                </div>
              </div>

              <div class="post-short">
                <?php echo $post['post_short'] ?>
              </div>

            </div>
              <?php
                $post_id = $post['id'];
                echo "<a href='../post.php?post_id=$post_id'>"
              ?>
              <div class="more_button">
                <span style="margin: auto;">Далее</span>
              </div>
            </a>
          </div>
        <?php } ?>
    </div>
  </div>
  <?php include '../usable/footer.php' ?>
</body>
</html>
