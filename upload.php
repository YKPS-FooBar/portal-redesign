<?php

include('config.php');

must_login();

function move_file($filename, $destination) {
  if (!is_file($filename)) {
    http_response_code(500);
    exit;
  }

  if (!is_dir(dirname($destination))) {
    mkdir(dirname($destination), 0777, true);
  }

  move_uploaded_file($filename, $destination);
}

// If matches a file name, save the file
foreach ($files as $name => $filename) {
  if (isset($_FILES[$name])) {
    move_file($_FILES[$name]['tmp_name'], 'uploads/' . $filename);
    $upload_times = date('M j H:i');
    echo json_encode($upload_times);
    exit;
  }
}

// If matches a file list name, save the files
foreach ($file_lists as $file_list) {
  if (isset($_FILES[$file_list])) {
    $upload_times = array();
    foreach ($_FILES[$file_list]['name'] as $i => $name) {
      move_file($_FILES[$file_list]['tmp_name'][$i], 'uploads/' . $file_list . '/' . basename($name));
      $upload_times[basename($name)] = date('M j H:i');
    }
    echo json_encode($upload_times);
    exit;
  }
}

http_response_code(400);

?>
