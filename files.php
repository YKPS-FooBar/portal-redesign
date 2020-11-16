<?php

include('config.php');

if (!isset($_POST['name']) || !substr_compare($_POST['name'], '[]', -2) === 0) {
  http_response_code(400);
  echo 'Invalid request';
  exit;
}

$dir = substr($_POST['name'], 0, -2);

if (!in_array($dir, $file_lists)) {
    http_response_code(400);
    echo 'Invalid file list';
    exit;
}

echo json_encode(dir_update_time('uploads/' . $dir));

?>
