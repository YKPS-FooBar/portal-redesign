<?php

session_start();
if (!isset($_SESSION['logged'])) {
  header('Location: /login.php');
  exit;
}

function update_time($file) {
  return date('M j H:i', filemtime($file));
}

if (isset($_FILES['bulletin'])) {
  $tmp_name = $_FILES['bulletin']['tmp_name'];
  move_uploaded_file($tmp_name, 'images/icons/daily-bulletin.pdf');
  $upload_times = update_time('images/icons/daily-bulletin.pdf');
} elseif (isset($_FILES['news'])) {
  $tmp_name = $_FILES['news']['tmp_name'];
  move_uploaded_file($tmp_name, 'images/icons/news-updates.pdf');
  $upload_times = update_time('images/icons/daily-bulletin.pdf');
} elseif (isset($_FILES['attachments'])) {
  $upload_times = array();
  foreach ($_FILES['attachments']['name'] as $i => $name) {
    $tmp_name = $_FILES['attachments']['tmp_name'][$i];
    $name = basename($name);
    move_uploaded_file($tmp_name, 'attachments/' . $name);
    $upload_times[$name] = update_time('attachments/' . $name);
  }
} else {
  http_response_code(400);
  exit;
}

echo json_encode($upload_times);

?>
