<?php
  include '../database/connection.php';

  $id = $_REQUEST['post_id'];
  $query = "DELETE FROM posts WHERE id = '$id'";

  if (mysql_query($query)) {
    echo "Succesfully deleted";
  } else {
    echo "error";
  }
?>
