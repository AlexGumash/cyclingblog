<?php
  session_start();
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
  <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=vjrxxkm7nqxh4y8r0xn6a4sg3fpa2bujpv3aar7w78wx8x3k"></script>
  <script>

    function sendComment(id){
      var commentText = $("textarea[name='comment-write']").val()
      $.ajax({
        type: "post",
        url: "user/comment.php",
        data: {post_id: id, text: commentText}
      }).done(function(result){
        location.reload();
      })
    }
  </script>
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
        $res = mysqli_query($date, $query);

        $post = mysqli_fetch_array($res, MYSQL_ASSOC);

        $counter = $post['post_visitors'] + 1;
        $query = "UPDATE posts SET post_visitors = $counter WHERE id = $post_id";
        mysqli_query($date, $query);
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

        <div class="comments">
          <span style="font-weight: bold; font-size: 20px">Комментарии</span>
          <div class="login">

          <?php
            $post_id = $_REQUEST['post_id'];
            $query = "SELECT * FROM comments WHERE post_id = '$post_id'";
            $result = mysqli_query($date, $query);
            if (!$result) {
              echo mysqli_error($date);
            }
            while ($comment = mysqli_fetch_array($result, MYSQL_ASSOC)) {
          ?>
            <div class="comment">
              <div class="info">
                <div class="info-user info-item">
                  <span style="font-weight: bold; font-size: 18px"><?php echo $comment['user'] ?></span>
                </div>
                <div class="info-date info-item">
                  <?php echo $comment['date'] ?>
                </div>
                <div class="info-time info-item">
                  <?php echo $comment['time'] ?>
                </div>
              </div>
              <div class="text">
                <?php echo $comment['text']; ?>
              </div>
            </div>
          <?php
            }
          ?>

            <?php
            if (!$_SESSION['login']) {
              ?>
              <div class="to-entry">
                <a href="user/entry.php" style="text-decoration: underline">Войти</a><span>, чтобы оставить комментарий</span>
              </div>
              <?php
            } else {


            ?>

            <div class="comment-input-div">
              <span style="margin-bottom: 10px">Оставьте свой комментарий, <?php echo $_SESSION['login'] ?></span>
              <textarea name="comment-write" rows="5" cols="40" class="textarea comment-write"></textarea>
              <div class="comment-button" onclick="sendComment(<?php echo $post_id; ?>)">
                Отправить
              </div>
            </div>
          <?php } ?>
          </div>
        </div>

    </div>
  </div>
  <?php include 'usable/footer.php' ?>
</body>
