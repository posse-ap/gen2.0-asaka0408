<?php
require('../dbconnect.php');

if (isset($_GET['id'])) {
  $id = htmlspecialchars($_GET['id']);

  $stmt = $db->prepare('SELECT * FROM questions WHERE prefecture_id = ?');
  $stmt->execute(array($id));
  $questions = $stmt->fetchAll();
}
else {
  header("Location: /");
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizy</title>
    <link rel="stylesheet" href="../css/recetCSS.css">
    <link rel="stylesheet" href="../css/kuizy.css">
</head>

<body>
  <div id="container">
    <?php foreach ($questions as $index => $question):?>

      <?php
      $question_index = $index + 1;

      $stmt = $db->prepare('SELECT * FROM selections WHERE question_id = ?');
      $stmt->execute(array($question['id']));
      $selections = $stmt->fetchAll();

      $stmt = $db->prepare('SELECT id, selection_name FROM selections WHERE question_id = ? AND valid = 1');
      $stmt->execute(array($question['id']));
      $answer = $stmt->fetch();

      ?>
      <!-- 中身を増やしたときの汎用性 -->
    <h3> <?php echo $question_index;?> .この地名はなんて読む？</h3>
    <img src="../img/<?php echo $question['image'];?>" alt="質問内容画像">
    <ul>
      <?php  foreach($selections as $index => $selection) : ?>

        <li
          id="answerlist_<?php echo $question_index . '_' . ($index + 1); ?>"
          name="answerlist_<?php echo $question_index; ?>"
          class="answerlist"
          >
          <?php echo $selection['selection_name'] ?>
        </li>
      <?php endforeach; ?>
      <li id="answerbox_<?php echo $question_index; ?>" class="answerbox">
        <span>
          正解は「
          <?php echo $answer['selection_name']; ?>
          」です！
        </span>
      </li>
    </ul>
    <?php endforeach; ?>
  </div>

  <!-- <script src="./js/quizy_3.js"></script> -->
</body>
</html>

<!-- <div id="correctBox' . $questions['order'] . '" class="correct_box"  onclick = "checkAnswer(' . $questions["order"] . ',0,0)">
          <p class="text_seikai">正解！</p>
          <p>正解は「' . $questions['question_name'] . '」です</p>
        </div>
        <div id="failBox' . $questions["order"] . '" class="fail_box"  onclick = "checkAnswer(' . $questions["order"] . ',0,0)">
          <p class="text_fuseikai">不正解。</p>
          <p>正解は「' . $questions['question_name'] . '」です</p>
        </div> -->

        <!-- echo '<li id="correctSelection' . $questions["order"] . '" onclick = "checkAnswer(' . $q
       