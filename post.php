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
  <base target="_blank">
</head>
<body>
  <?php include 'usable/header.php' ?>
  <div class="main">
    <div class="container container-main">

      <?php
        $post_id = $_REQUEST['post_id'];
        $query = "SELECT * FROM posts WHERE id = $post_id";
        $res = mysql_query($query);

        $post = mysql_fetch_array($res, MYSQL_ASSOC);

        $counter = $post['post_visitors'] + 1;
        $query = "UPDATE posts SET post_visitors = $counter WHERE id = $post_id";
        mysql_query($query);
      ?>
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
                <?php
                  $str = $post['post_content'];
                  $substrings = explode("\n", $str);
                  foreach($substrings as $out)
                  {
                    preg_match_all('/img [а-яА-ЯёЁa-zA-Z0-9]{0,}\.(?:jp(?:e?g|e|2)|gif|png|tiff?|bmp|ico)$/i',$out,$img);
                    if ($img[0][0]) {
                      $src = explode(" ", $img[0][0]);
                      echo "<img src='images/$src[1]' class='post-content-img'>";
                    } else {
                      echo "<p style='margin-bottom: 10px;'>".$out."</p>";
                    }
                  }
                ?>
              </div>

            </div>

          </div>

    </div>
  </div>
  <?php include '../usable/footer.php' ?>
</body>
