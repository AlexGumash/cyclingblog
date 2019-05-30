<?php include '../database/connection.php' ?>
<?php
session_start();

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

  $post_content = str_replace("'", '"', $post_content);
  $post_short = str_replace("'", '"', $post_short);
  $post_visitors = 0;

  $query = "INSERT INTO preps (id, prep_title_img, prep_title, prep_section, prep_short, prep_content) VALUES ('NULL', '$file_name', '$post_title', '$post_section', '$post_short', '$post_content')";
  $result = mysqli_query($date, $query);
  header('Location: ../index.php');
}

?>
