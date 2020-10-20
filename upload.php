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
  return update_time($destination);
}

if (isset($_FILES['bulletin'])) {
  $upload_times = move_file($_FILES['bulletin']['tmp_name'], 'images/icons/daily-bulletin.pdf');
} elseif (isset($_FILES['news'])) {
  $upload_times = move_file($_FILES['news']['tmp_name'], 'images/icons/news-updates.pdf');
} elseif (isset($_FILES['attachments'])) {
  $upload_times = array();
  foreach ($_FILES['attachments']['name'] as $i => $name) {
    $upload_times[$name] = move_file($_FILES['attachments']['tmp_name'][$i], 'attachments/' . basename($name));
  }
} else {
  http_response_code(400);
  exit;
}

echo json_encode($upload_times);

?>
