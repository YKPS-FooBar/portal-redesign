<?php

ini_set('memory_limit', '256M');
ini_set('post_max_size', '512M');
ini_set('file_uploads', 'On');
ini_set('upload_max_filesize', '512M');
ini_set('max_file_uploads', '100');

date_default_timezone_set('Asia/Shanghai');

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

define('FILES', array('daily-bulletin.pdf', 'news-updates.pdf'))
define('FILE_LISTS', array('attachments'));

foreach (FILES as $file) {
  touch('uploads/' . $file);
}

foreach (FILE_LISTS as $file_list) {
  mkdir('uploads/' . $file_list, 0777, true);
}

function redirect_login() {
  if (!isset($_SESSION['logged'])) {
    header('Location: /login.php');
    exit;
  }
}

function must_login() {
  if (!isset($_SESSION['logged'])) {
    http_response_code(401);
    exit;
  }
}

function update_time($file) {
  if (is_file($file)) {
    return date('M j H:i', filemtime($file));
  } else {
    return 'None';
  }
}

function dir_update_time($dir) {
  // scandir sorts alphabetically by default
  $filenames = array_diff(scandir($dir), array('.', '..'));
  $update_times = array();
  foreach ($filenames as $filename) {
    $update_times[$filename] = update_time($dir . '/' . $filename);
  }
  return $update_times;
}

?>
