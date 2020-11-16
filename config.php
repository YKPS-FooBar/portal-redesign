<?php

// These may not always work; please set these in php.ini
ini_set('memory_limit', '256M');
ini_set('post_max_size', '512M');
ini_set('file_uploads', 'On');
ini_set('upload_max_filesize', '512M');
ini_set('max_file_uploads', '100');

date_default_timezone_set('Asia/Shanghai');

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Constant array of files that can be uploaded and fetched
// Keys indicate HTTP form names that refer to these files
// The file is stored under uploads/$file
$files = array('bulletin' => 'daily-bulletin.pdf', 'news' => 'news-updates.pdf');

// Constant array of file lists (e.g. attachments) that can be uploaded and fetched
// Keys indicate HTTP form names that refer to these lists
// The files are stored under uploads/$file_list/*
// Since it is multiple, each key should be the value appended with [], e.g. attachments[]
$file_lists = array('attachments[]' => 'attachments');

if (!is_dir('uploads')) {
  mkdir('uploads', 0777, true);
}

foreach ($files as $file) {
  if (!file_exists('uploads/' . $file)) {
    touch('uploads/' . $file);
  }
}

foreach ($file_lists as $file_list) {
  if (!is_dir('uploads/' . $file_list)) {
    mkdir('uploads/' . $file_list, 0777, true);
  }
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

// Scans a directory and returns filename => update time array
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
