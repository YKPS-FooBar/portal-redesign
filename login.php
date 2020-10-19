<?php

session_start();

$users = array('admin' => 'ykpao');

$attempt = isset($_POST['username']) && isset($_POST['password']);
$found = $attempt && isset($users[$_POST['username']]) && $_POST['password'] === $users[$_POST['username']];

if ($found) {
  $_SESSION['logged'] = true;
  $_SESSION['username'] = $POST['username'];
  header('Location: /admin.php');
  exit;
}

if ($attempt) {
  http_response_code(401);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
      * {
        box-sizing: border-box;
      }

      html {
        font-size: 16px;
      }

      body {
        font-family: Helvetica Now Display, Helvetica, sans-serif;
        margin: 0;
        line-height: 1.5;
      }

      .login {
        text-align: center;
      }

      .heading {
        text-align: center;
      }
    </style>
  </head>

  <body>
    <h2 class="heading">Admin Portal</h2>

    <form class="login" method="post">
      <?php if ($attempt) { ?>
        <p>Wrong credentials.</p>
      <?php } ?>

      <p>
        <label for="username">Username:</label>
        <input id="username" type="text" name="username" autocomplete="off">
      </p>

      <p>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password">
      </p>

      <input type="submit" value="Log in">
    </form>
  </body>
</html>
