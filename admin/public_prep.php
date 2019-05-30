<?php
  include '../database/connection.php';
  $id = $_REQUEST['id'];

  $query = "SELECT * FROM preps WHERE id = '$id'";
  $result = mysqli_query($date, $query);
  $prep = mysqli_fetch_array($result, MYSQL_ASSOC);

  $post_date = date("y.m.d");
  $file_name = $prep['prep_title_img'];
  $post_title = $prep['prep_title'];
  $post_section = $prep['prep_section'];
  $post_short = $prep['prep_short'];
  $post_content = $prep['prep_content'];

  $query = "INSERT INTO posts (id, post_date, post_title_img, post_title, post_section, post_short, post_content, post_visitors) VALUES ('NULL', '$post_date', '$file_name', '$post_title', '$post_section', '$post_short', '$post_content', 0)";

  $result = mysqli_query($date, $query);

  if (!$result) {
    echo mysqli_error($date);
  }

  $query = "DELETE FROM preps WHERE id = '$id'";
  mysqli_query($date, $query);
  header('Location: preps.php');
?>
