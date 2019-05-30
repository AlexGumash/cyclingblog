<?php include '../database/connection.php' ?>
<?php
session_start();
if ($_SESSION['rights'] != 'admin') die ('Требуется учетная запись администратора');
if (isset($_POST['submit-button'])) {

  if(isset($_FILES['post_title_img'])){
    $errors= array();
    $file_name = $_FILES['post_title_img']['name'];
    $file_size =$_FILES['post_title_img']['size'];
    $file_tmp =$_FILES['post_title_img']['tmp_name'];
    $file_type=$_FILES['post_title_img']['type'];
    if(empty($errors)==true){
      move_uploaded_file($file_tmp,"../images/".$file_name);
    } else {
      print_r($errors);
    }
  }

  $post_date = date("y.m.d");
  $post_title_img = $file_name;
  $post_title = $_REQUEST['post_name'];
  $post_section = $_REQUEST['post_section'];
  $post_short = $_REQUEST['post_short'];
  $post_content = $_REQUEST['post_content'];

  $id = $_REQUEST['id'];
  $query = "INSERT INTO posts (id, post_date, post_title_img, post_title, post_section, post_short, post_content, post_visitors) VALUES ('NULL', '$post_date', '$file_name', '$post_title', '$post_section', '$post_short', '$post_content', 0)";

  $result = mysqli_query($date, $query);

  if (!$result) {
    echo mysqli_error($date);
  }

  $query = "DELETE FROM preps WHERE id = '$id'";
  mysqli_query($date, $query);
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
    function deletePrep(id){
      $.ajax({
        type: "post",
        url: "deletePrep.php",
        data: {prep_id: id}
      }).done(function(result){
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
      <div class="preps">
        <?php
          $query = "SELECT * FROM preps";
          $result = mysqli_query($date, $query);
          while ($prep = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            ?>
            <a href="prewatch.php?id=<?php echo $prep['id']; ?>" style="color: black">

              <div class="prep">
                <div class="prep_title">
                  <?php echo $prep['prep_title'] ?>
                </div>
                <div class="prep_short">
                  <?php echo $prep['prep_short'] ?>
                </div>
                <div class="icons">
                  <div class="icon icon-edit">
                    <a href="refactor_prep.php?id=<?php echo $prep['id']; ?>">
                      <img src="../images/edit.png" alt="edit" class="icon-img">
                    </a>
                  </div>
                  <div class="icon icon-delete" onClick="deletePrep(<?php echo $prep['id'] ?>)">
                    <img src="../images/delete.png" alt="delete" class="icon-img">
                  </div>
                </div>
              </div>

            </a>
            <?php
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
