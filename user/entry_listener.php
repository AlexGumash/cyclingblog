<?php include '../database/connection.php' ?>
<?php
session_start();

if (isset($_REQUEST['submit-button-registration'])) {
  $login = $_REQUEST['login'];
  $password = $_REQUEST['password'];
  $password_confirm = $_REQUEST['password-confirm'];

  if ($password == $password_confirm) {
    $hash_pass = hash('md5', $password);
    $query = "INSERT INTO users (id, login, password, rights) VALUES (NULL, '$login', '$hash_pass', 'user')";
    $result = mysqli_query($date, $query);

    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQL_ASSOC);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $hash_pass;
    $_SESSION['rights'] = $user['rights'];
    header('Location: ../index.php');
  }
}

if (isset($_REQUEST['submit-button-entry'])) {
  $login = $_REQUEST['login'];
  $password = $_REQUEST['password'];
  $hash_pass = hash('md5', $password);

  $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
  if (!$user) {
    die("Неправильный логин или пароль");
  }
  $_SESSION['login'] = $login;
  $_SESSION['password'] = $hash_pass;
  $_SESSION['rights'] = $user['rights'];
  header('Location: ../index.php');
}

?>
