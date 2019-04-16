<?php include '../database/connection.php' ?>
<?php
// if(isset($_FILES['post_title_img'])){
//   $errors= array();
//   $file_name = $_FILES['post_title_img']['name'];
//   $file_size =$_FILES['post_title_img']['size'];
//   $file_tmp =$_FILES['post_title_img']['tmp_name'];
//   $file_type=$_FILES['post_title_img']['type'];
//   echo $file_name;
//
//   if(empty($errors)==true){
//     move_uploaded_file($file_tmp,"images/".$file_name);
//     echo "Success";
//   } else {
//     print_r($errors);
//   }
// }

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

      <div class="menu-container">
        <ul class="menu">
          <li class="menu-item">
              <div class="menu-item-link">
                Добавить запись
              </div>
          </li>
          <li class="menu-item">
              <div class="menu-item-link">
                Редактировать записи
              </div>
          </li>
          <li class="menu-item">
              <div class="menu-item-link">
                Разместить рекламу
              </div>
          </li>
          <!-- <li class="menu-item">
              <div class="menu-item-link">
                Полезное
              </div>
          </li>
          <li class="menu-item">
              <div class="menu-item-link">
                Интересное
              </div>
          </li> -->
        </ul>
      </div>

    </div>
  </div>
  <div class="main">
    <div class="container container-main">
      <?php @include 'add_post.php' ?>
    </div>
  </div>
</body>
</html>
