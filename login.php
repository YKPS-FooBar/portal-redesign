<?php

include('config.php');

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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/favicon.ico">
    <title>Admin Login | YKPS Portal</title>
    <style>
      :root {
        --color-shade: rgba(0, 0, 0, .05);
        --color-text-main: #212529;
        --color-text-muted: #6c757d;
        --color-text-link: #0366d6;
        --color-text-error: #dc3545;
        --border-main: 1px solid #e1e4e8;
        --shadow-main: 0 5px 20px 0 var(--color-shade);
        --background-bulletin: linear-gradient(200deg, #5cd477, #00a99d);
        --background-news: linear-gradient(200deg, #ffa942, #ff5760);
        --background-attachments: linear-gradient(200deg, #f96cf9, #b977ff);
      }

      * {
        box-sizing: border-box;
      }

      html {
        font-size: 16px;
      }

      body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        margin: 0;
        line-height: 1.5;
        color: var(--color-text-main);
      }

      .login, .heading {
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
