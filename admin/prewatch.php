<?php
  session_start();
  if ($_SESSION['rights'] != 'admin') die ('Требуется учетная запись администратора');
  include '../database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/post.css">
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

      <?php @include 'admin-menu.php' ?>

    </div>
  </div>

  <div class="main">
    <div class="container container-main">

      <a href="#" onclick="history.back();" style="color: black;">
        <div class="back-button">
          &#8592; вернуться
        </div>
      </a>

      <?php
        $id = $_REQUEST['id'];
        $query = "SELECT * FROM preps WHERE id = '$id'";
        $result = mysqli_query($date, $query);
        $prep = mysqli_fetch_array($result, MYSQL_ASSOC);
      ?>
        <div class="post-container">
          <div class="post">

            <div class="container-post">
              <div class="post-header">
                <div class="post-header-item post-title">
                  <?php echo $prep['prep_title'] ?>
                </div>
              </div>

              <div class="post-content">
                <?php $src = $prep['prep_title_img'] ?>
                <img src="<?php echo "../images/$src"; ?>" alt="post title image" class="post-title-image">
                <?php
                  echo $prep['prep_content'];
                ?>
              </div>

            </div>

          </div>

        </div>
        <div class="buttons">
          <a href="refactor_prep.php?id=<?php echo $prep['id']; ?>" style="color: black">
            <div class="edit buttons-button">
              <span>Редактировать</span>
            </div>
          </a>
          <a href="public_prep.php?id=<?php echo $prep['id']; ?>" style="color: black">
            <div class="public buttons-button">
              <span>Опубликовать</span>
            </div>
          </a>
        </div>

    </div>
  </div>
</body>
