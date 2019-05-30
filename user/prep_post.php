<?php include '../database/connection.php' ?>
<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../admin/admin.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=vjrxxkm7nqxh4y8r0xn6a4sg3fpa2bujpv3aar7w78wx8x3k"></script>
  <script>
  tinymce.init({
    selector: ".post-content",  // change this value according to your HTML
    plugins: 'autoresize fullscreen image link media table anchor imagetools textpattern advcode lists',
    // plugins: 'autoresize fullpage searchreplace advcode visualblocks visualchars fullscreen image link media mediaembed codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help formatpainter mentions linkchecker',
    toolbar: 'formatselect | bold italic strikethrough forecolor backcolor formatpainter | link image media | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
    autoresize_bottom_margin: 70,
    width: '80%',
    image_prepend_url: "../images/",
    image_dimensions: false,
    image_class_list: [
      {
        title: 'None', value: ''
      },
      {
        title: 'Image', value: 'img-in-post'
      }
    ]
  });
  tinymce.init({
    selector: ".post-short",  // change this value according to your HTML
    plugins: 'autoresize ',
    toolbar: 'bold italic forecolor backcolor ',
    width: '500px',
    menubar: false
  });
  </script>
  <title>Cycling blog</title>
</head>
<body>
  <?php include '../usable/header.php' ?>
  <div class="main">
    <div class="container container-main">

      <div class="add-post">
        <form class="add-post-form" action="preps_listener.php" method="post" enctype="multipart/form-data">
          <div class="form-container">

            <div class="form-input-div" style="width: 50%">
              <span>
                Название:
              </span>
              <input type="text" name="post_name" autofocus class="form-input" required>
            </div>

            <div class="form-input-div" style="width: 50%">
              <span>
                Рубрика:
              </span>
              <select class="select" name="post_section" size="1">
                <option value="Покатушки" class="select-option" selected>Покатушки</option>
                <option value="Путешествия" class="select-option">Путешествия</option>
                <option value="Полезное" class="select-option">Полезное</option>
                <option value="Интересное" class="select-option">Интересное</option>
              </select>
            </div>

            <div class="form-input-div">
              <span>
                Заглавная фотография:
              </span>
              <input type="file" name="post_title_img" accept="image/*" required>
            </div>

            <div class="form-input-div">
              <span>
                Краткое описание:
              </span>
              <textarea name="post_short" rows="8" cols="80" class="textarea post-short"></textarea>
            </div>

            <div class="form-input-div form-input-content">
              <span style="margin-bottom: 30px">
                Содержание:
              </span>
              <textarea name="post_content" class="textarea post-content"></textarea>
            </div>

            <div class="submit-button-container">
              <input type="submit" name="submit-button" value="Опубликовать" class="submit-button">
            </div>

          </div>
        </form>
      </div>

    </div>
  </div>
  <?php include '../usable/footer.php' ?>
</body>
</html>
