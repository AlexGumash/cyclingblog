<?php
  session_start();
  include '../database/connection.php';
  date_default_timezone_set('Europe/Kaliningrad');
  $login = $_SESSION['login'];
  $time = date('H:i:s');
  $comment_date = date('y.m.d');
  $text = $_REQUEST['text'];
  $post_id = $_REQUEST['post_id'];

  $query = "INSERT INTO comments (id, user, date, time, text, post_id) VALUES (NULL, '$login', '$comment_date', '$time', '$text', '$post_id')";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }
?>
