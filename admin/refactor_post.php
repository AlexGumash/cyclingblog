<?php include '../database/connection.php' ?>


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

      <div class="add-post">

        <?php
          $id = $_REQUEST['id'];

          $query = "SELECT * FROM posts WHERE id = '$id'";

          $result = mysql_query($query);

          $post = mysql_fetch_array($result, MYSQL_ASSOC)
        ?>
        <form class="add-post-form" action="refactor_posts.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
          <div class="form-container">

            <div class="form-input-div" style="width: 50%">
              <span>
                Название:
              </span>
              <input type="text" name="post_name" autofocus class="form-input" value="<?php echo $post['post_title'] ?>">
            </div>

            <div class="form-input-div" style="width: 50%">
              <span>
                Рубрика:
              </span>
              <select class="select" name="post_section" size="1">
                <option value="Покатушки" class="select-option" <?php if ($post['post_section'] == 'Покатушки') {
                  echo "selected";
                } ?>>Покатушки</option>
                <option value="Путешествия" class="select-option" <?php if ($post['post_section'] == 'Путешествия') {
                  echo "selected";
                } ?>>Путешествия</option>
                <option value="Полезное" class="select-option" <?php if ($post['post_section'] == 'Полезное') {
                  echo "selected";
                } ?>>Полезное</option>
                <option value="Интересное" class="select-option" <?php if ($post['post_section'] == 'Интересное') {
                  echo "selected";
                } ?>>Интересное</option>
              </select>
            </div>

            <div class="form-input-div">
              <span>
                Заглавная фотография:
              </span>
              <input type="file" name="post_title_img" accept="image/*">
            </div>

            <div class="form-input-div">
              <span>
                Краткое описание:
              </span>
              <textarea name="post_short" rows="8" cols="80" class="textarea post-short"><?php echo $post['post_short'] ?></textarea>
            </div>

            <div class="form-input-div">
              <span>
                Содержание:
              </span>
              <textarea name="post_content" rows="8" cols="80" class="textarea post-content"><?php echo $post['post_content'] ?></textarea>
            </div>

            <div>
              <input type="submit" name="submit-button" value="Изменить" class="submit-button">
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
