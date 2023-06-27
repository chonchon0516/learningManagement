<?php

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$contents = filter_input(INPUT_POST, 'contents');
$theme= filter_input(INPUT_POST, 'theme');


// [解説！]ガード節になっている
if (!empty($theme) && !empty($contents)) {
    $sql = 'INSERT INTO `learningnotes`(`theme`, `contents`) VALUES(:theme, :contents)';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':theme', $theme, PDO::PARAM_STR);
    $statement->bindValue(':contents', $contents, PDO::PARAM_STR);
    $statement->execute();

    // [解説！]リダイレクト処理
    header('Location: ./index.php');
    // [解説！]リダイレクトしても処理が一番下まで続いてしまうので「exit」しておこう！！！
    exit();
}
$error = 'タイトルまたは感想が入力されていません';
?>

<body>
  <div>
    <p><?php echo $error . "\n"; ?></p>
    <a href="./index.php">
        <p>トップページへ</p>
    </a>
  </div>
</body>