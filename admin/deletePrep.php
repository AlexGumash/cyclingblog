<?php
  include '../database/connection.php';

  $id = $_REQUEST['prep_id'];
  $query = "DELETE FROM preps WHERE id = '$id'";

  if (mysqli_query($date, $query)) {
    echo "Succesfully deleted";
  } else {
    echo "error";
  }
?>
