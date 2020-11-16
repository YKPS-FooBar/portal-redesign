<?php

include('config.php');

must_login();

if (!isset($_POST['name']) || !substr_compare($_POST['name'], '[]', -2) === 0 || !isset($_POST['filename'])) {
  http_response_code(400);
  echo 'Invalid request';
  exit;
}

$dir = substr($_POST['name'], 0, -2);
$filename = $_POST['filename'];

if (!in_array($dir, $file_lists)) {
  http_response_code(400);
  echo 'Invalid file list';
  exit;
}

if (!is_file('uploads/' . $dir . '/' . $filename)) {
  http_response_code(400);
  echo 'File does not exist';
  exit;
}

unlink($dir . '/' . $filename);

?>
