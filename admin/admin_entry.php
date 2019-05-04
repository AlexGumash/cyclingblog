<?php include '../database/connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="admin-entry.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Admin entry</title>
</head>
<body>
  <div class="header">
    <div class="container container-header">

      <div class="container-title">
        <span class="title">Blog about cycling</span>
        <img src="../images/headericon.png" alt="Icon" class="title-icon">
      </div>
      <div>
        <span style="font-size: 20px;">Admin entry</span>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="container container-main">
      <div class="entry-form">
        <form action="admin.php" method="post">
          <div class="form-container">
            <div class="form-input-div">
              <span>
                Логин:
              </span>
              <input type="text" name="admin-login" class="form-input">
            </div>
            <div class="form-input-div">
              <span>
                Пароль:
              </span>
              <input type="password" name="admin-pass" class="form-input">
            </div>
            <div>
              <input type="submit" name="submit-button-entry" value="Войти" class="submit-button">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
