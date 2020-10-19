<?php

session_start();
if (!isset($_SESSION['logged'])) {
  header('Location: /login.php');
  exit;
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

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
      :root {
        --color-shade: rgba(0, 0, 0, .05);
        --color-text-main: #24292e;
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
        font-family: Helvetica Now Display, Helvetica, sans-serif;
        margin: 0;
        line-height: 1.5;
        color: var(--color-text-main);
      }

      .heading {
        text-align: center;
      }

      .upload-container {
        position: absolute;
        left: 10%;
        right: 10%;
        height: 80%;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(15rem, 1fr));
        grid-auto-rows: 1fr;
        grid-gap: 2rem;
        align-items: stretch;
      }

      .upload-container > * {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        border-radius: 20px;
        border: var(--border-main);
        overflow: hidden;
        box-shadow: var(--shadow-main);
      }

      .upload-area {
        flex: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 6rem;
        cursor: pointer;
        background: var(--color-shade);
      }

      .upload-area .label {
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .upload-area.over .label {
        -webkit-text-fill-color: white;
      }

      #bulletin-upload .upload-area.over, #bulletin-upload .label {
        background-image: var(--background-bulletin);
      }

      #news-upload .upload-area.over, #news-upload .label {
        background-image: var(--background-news);
      }

      #attachments-upload .upload-area.over, #attachments-upload .label {
        background-image: var(--background-attachments);
      }

      .file-input {
        display: none;
      }

      .upload-description {
        text-align: center;
        color: var(--color-text-muted);
        user-select: none;
      }

      .label {
        margin: 0;
      }

      .error {
        color: var(--color-text-error);
      }

      .upload-area.over .upload-description {
        color: white;
      }

      .status {
        text-align: center;
      }

      .status, .file-list:not(:empty) {
        border-top: var(--border-main);
      }

      .status, .file {
        padding: 1rem;
      }

      .status, .file-update-time {
        color: var(--color-text-muted);
      }

      .file-list {
        overflow-y: scroll;
      }

      .file-view {
        color: var(--color-text-link);
        text-decoration: none;
      }

      .file-view:hover {
        text-decoration: underline;
      }

      .file {
        display: flex;
      }

      .file:not(:last-child) {
        border-bottom: var(--border-main);
      }

      .filename {
        flex: auto;
        margin-right: .5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }

      .filename a {
        color: inherit;
        text-decoration: none;
      }

      .filename a:hover {
        text-decoration: underline;
      }

      .file-update-time {
        margin-right: .5rem;
        white-space: nowrap;
      }

      .file-remove {
        cursor: pointer;
        user-select: none;
      }

      .file-remove:hover {
        color: var(--color-text-link);
      }
    </style>
  </head>

  <body>
    <h2 class="heading">Admin Portal</h2>

    <div class="upload-container">
      <div id="bulletin-upload">
        <div class="upload-area" target="bulletin-input">
          <input id="bulletin-input" class="file-input" type="file" accept="application/pdf" name="bulletin">
          <div class="upload-description">
            <h2 class="label">Daily Bulletin</h2>
            Drag or upload
            <div class="error" for="bulletin"></div>
          </div>
        </div>
        <div class="status">
          Updated: <span class="update-time" for="bulletin"></span>
          <a class="file-view" href="/images/icons/daily-bulletin.pdf" target="_blank">View</a>
        </div>
      </div>

      <div id="news-upload">
        <div class="upload-area" target="news-input">
          <input id="news-input" class="file-input" type="file" accept="application/pdf" name="news">
          <div class="upload-description">
            <h2 class="label">News & Updates</h2>
            Drag or upload
            <div class="error" for="news"></div>
          </div>
        </div>
        <div class="status">
          Updated: <span class="update-time" for="news"></span>
          <a class="file-view" href="/images/icons/news-updates.pdf" target="_blank">View</a>
        </div>
      </div>

      <div id="attachments-upload">
        <div class="upload-area" target="attachments-input">
          <input id="attachments-input" class="file-input" type="file" name="attachments[]" multiple>
          <div class="upload-description">
            <h2 class="label">Attachments</h2>
            Drag or upload
            <div class="error" for="attachments[]"></div>
          </div>
        </div>
        <div class="file-list" for="attachments[]"></div>
      </div>
    </div>

    <script>
      const fileUpdateTimes = <?php echo json_encode(array(
        'bulletin' => update_time('images/icons/daily-bulletin.pdf'),
        'news' => update_time('images/icons/news-updates.pdf'),
        'attachments[]' => dir_update_time('attachments'),
      )); ?>;

      const reloadUpdateTimes = name => {
        const single = typeof fileUpdateTimes[name] === 'string';

        if (single) {
          const updateText = document.querySelector(`.update-time[for="${name}"]`);
          updateText.innerText = fileUpdateTimes[name];
        } else {
          const fileList = document.querySelector(`.file-list[for="${name}"]`);

          // remove all children from file list
          [...fileList.children].forEach(file => fileList.removeChild(file));

          // fill file list with files
          Object.entries(fileUpdateTimes[name]).sort().forEach(([filename, updateTime]) => {
            const file = document.createElement('div');
            file.classList.add('file');
            file.setAttribute('filename', filename);

            const filenameText = document.createElement('span');
            filenameText.classList.add('filename');

            const link = document.createElement('a');
            link.href = `/${name.replace(/\[\]$/, '')}/${encodeURIComponent(filename)}`;
            link.target = '_blank';
            link.innerText = filename;
            filenameText.appendChild(link);

            file.appendChild(filenameText);

            const updateText = document.createElement('span');
            updateText.classList.add('file-update-time');
            updateText.innerText = updateTime;
            file.appendChild(updateText);

            const removeButton = document.createElement('span');
            removeButton.classList.add('file-remove');
            removeButton.innerHTML = '&times;';
            removeButton.addEventListener('click', () => remove(name, filename));
            file.appendChild(removeButton);

            fileList.appendChild(file);
          });
        }
      }

      Object.keys(fileUpdateTimes).forEach(reloadUpdateTimes);

      const upload = (name, files) => {
        const formData = new FormData();
        const updateText = document.querySelector(`.update-time[for="${name}"]`);
        const errorText = document.querySelector(`.error[for="${name}"]`);
        const single = typeof fileUpdateTimes[name] === 'string';

        errorText.innerText = '';

        // Single files must be PDF
        if (single) {
          files = [...files].filter(file => file.type === 'application/pdf');
          if (files.length === 0) {
            return errorText.innerText = 'Please select a PDF document';
          }
          if (files[0].size > 512 * 1024 * 1024) {
            return errorText.innerText = 'File too large (>512M)';
          }
          formData.append(name, files[0]);
        } else {
          if (files.length === 0) {
            return errorText.innerText = 'No files selected';
          } else if (files.length > 100) {
            return errorText.innerText = 'Too many files at a time (>100)';
          }
          if ([...files].map(file => file.size).reduce((x, y) => x + y) > 512 * 1024 * 1024) {
            return errorText.innerText = 'Files too large (>512M)';
          }
          [...files].forEach(file => formData.append(name, file));
        }

        fetch(`/upload.php`, {
          method: 'POST',
          body: formData,
        })
        .then(response => response.json())
        .then(updateTimes => {
          if (single) {
            // updateTimes is '<date>'
            fileUpdateTimes[name] = updateTimes;
          } else {
            // updateTimes is like {'file1.txt': '<date>', 'file2.txt': '<date>'}
            Object.assign(fileUpdateTimes[name], updateTimes);
          }
          reloadUpdateTimes(name);
        })
        .catch(error => {
          errorText.innerText = `Failed to upload (${error.message})`;
        });
      }

      const remove = (name, filename) => {
        // name is the name of a file list like 'attachments[]'

        const formData = new FormData();

        formData.append('name', name);
        formData.append('filename', filename);

        fetch(`/remove.php`, {
          method: 'POST',
          body: formData,
        })
        .then(response => {
          delete fileUpdateTimes[name][filename];
          reloadUpdateTimes(name);
        })
        .catch(error => {
          console.error(`Failed to delete ${filename} from ${name} (${error})`);
        });
      }

      const eachFile = (entry, callback) => {
        if (entry.isFile) {
          entry.file(callback);
        } else if (entry.isDirectory) {
          entry.createReader().readEntries(subEntries => {
            subEntries.forEach(subEntry => {
              eachFile(subEntry, callback);
            });
          });
        }
      }

      const preventDrag = e => {
        if (e.dataTransfer.types.includes('Files')) {
          e.preventDefault();
        }
      }
      document.addEventListener('dragenter', preventDrag, false);
      document.addEventListener('dragover', preventDrag, false);
      document.addEventListener('dragleave', preventDrag, false);
      document.addEventListener('drop', preventDrag, false);

      [...document.getElementsByClassName('upload-area')].forEach(area => {
        const target = document.getElementById(area.getAttribute('target'));

        let automaticDragLeave;
        const enter = e => {
          area.classList.add('over');

          if (e.dataTransfer) {
            if (automaticDragLeave) {
              clearTimeout(automaticDragLeave);
            }
            automaticDragLeave = setTimeout(() => area.classList.remove('over'), 200);

            if (e.dataTransfer.types.includes('Files')) {
              e.dataTransfer.dropEffect = 'copy';
              e.stopPropagation();
              e.preventDefault();
            }
          }
        };

        const leave = e => {
          area.classList.remove('over');

          if (e.dataTransfer) {
            e.dataTransfer.dropEffect = 'none';
            e.stopPropagation();
            e.preventDefault();
          }
        }

        area.addEventListener('mouseenter', enter, false);
        area.addEventListener('mouseover', enter, false);
        area.addEventListener('mouseout', leave, false);
        area.addEventListener('click', () => {
          target.click();
        }, false);

        area.addEventListener('dragenter', enter, false);
        area.addEventListener('dragover', enter, false);
        area.addEventListener('dragleave', leave, false);
        area.addEventListener('drop', e => {
          area.classList.remove('over');

          e.stopPropagation();
          e.preventDefault();

          if (DataTransferItem.prototype.webkitGetAsEntry) {
            [...e.dataTransfer.items].forEach(item => eachFile(item.webkitGetAsEntry(), file => {
              upload(target.name, [file])
            }));
          } else {
            upload(target.name, e.dataTransfer.files);
          }
        }, false);
      });

      [...document.getElementsByClassName('file-input')].forEach(input => {
        input.addEventListener('change', () => {
          upload(input.name, input.files);
          input.value = null;
        }, false);
      });
    </script>
  </body>
</html>
