<?php
require("./dbconnect.php");

$stmt = $db->query('SELECT * FROM prefectures');
$prefectures = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>quizy</title>
</head>
<body>
  <?php foreach ($prefectures as $prefecture) : ?>

    <p>
      <a href="/quiz?id=<?php echo $prefecture['id']; ?>"><?php echo $prefecture['id'] . ':' . $prefecture['prefecture_name']; ?> </a>
    </p>
  <?php endforeach; ?>
</body>
</html>