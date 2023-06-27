<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM learningnotes where id = $id";
$statement = $pdo->prepare($sql);
$statement->execute();
$note = $statement->fetch();
?>

<body>
  
  <h2>編集</h2>

  <form method="post" action="./update.php">

    <input type="hidden" name="id" value=<?php echo $note['id']; ?>>

    <div>
      <label for="name">テーマ
        <input type="text" name="theme" value=<?php echo $note['theme']; ?>>
      </label>
    </div>

    <div>
      <label for="contents">学習のまとめ
        <input type="textarea" name="contents" value=<?php echo $note[
            'contents'
        ]; ?>>
      </label>
    </div>

    <button type="submit">更新</button>
    
  </form>

</body>