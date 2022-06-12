<?php
require('../dbconnect.php');

$questions = ['たかなわ'];
$choices = ['たかなわ', 'たかわ', 'こうわ'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>quizy</title>
  <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="main">
    <?php foreach ($questions as $index => $question) : ?>
      <div>
        <h1><?= $index + 1?>. この地名はなんて読む？</h1>
        <ul>
          <?php foreach ($choices as $index => $choice) : ?>
            <li>
              <?php echo $choice; ?>
            </li>
          <?php endforeach; ?>
          <li>
            <span>正解！</span><br>
            <span>正解は「たかなわ」です！</span>
          </li>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
</body>

</html>