<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$sql = "SELECT * FROM learningnotes";
$statement = $pdo->prepare($sql);
$statement->execute();
$notes = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($notes as $key => $value) {
    $standard_key_array[$key] = $value['created_at'];
}
if(!empty($notes)){
  array_multisort($standard_key_array, SORT_DESC, $notes);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./main.js" defer></script>
    <link rel="stylesheet" href="./style.css">
</head>
  <body>
    <header class="header">
      <a href="./create.php" class="new_blog">まとめを追加</a>
    </header>
  <div>
    <table border="1">
      <tr>
        <th>テーマ</th>
        <th>学習のまとめ</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
      </tr>

      <?php foreach ($notes as $note): ?>
        <tr>
          <td><?php echo $note['theme']; ?></td>
          <td><?php echo $note['contents']; ?></td>
          <td><?php echo $note['created_at']; ?></td>
          <td><a href="./edit.php?id=<?php echo $notes['id']; ?>">編集</a></td>
          <td><a href="./delete.php?id=<?php echo $notes['id']; ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>

</body>