<?php include '../database/connection.php' ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Покатушки</title>
</head>
<body>
  <?php include '../usable/header.php' ?>
  <div class="main">
    <div class="container container-main">
      <div class="line-container">
        <span class="container-title-popular">Покатушки</span>
        <?php
        $query = "SELECT * FROM posts WHERE post_section = 'Покатушки' ORDER BY post_date DESC";
        $res = mysqli_query($date, $query);

        while ($post = mysqli_fetch_array($res, MYSQL_ASSOC)) {
          ?>
          <div class="post-line">

            <div class="post" style='margin-right:10px;'>
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

          <?php
          if ($post = mysqli_fetch_array($res, MYSQL_ASSOC)) {

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
      <?php } ?>

      </div>
      <?php include '../usable/popular.php' ?>

    </div>
  </div>
  <?php include '../usable/footer.php' ?>
</body>
</html>
