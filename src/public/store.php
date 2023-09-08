<?php

require_once __DIR__ . '/../vendor/autoload.php';
use App\LearningManager;


$contents = filter_input(INPUT_POST, 'contents');
$theme= filter_input(INPUT_POST, 'theme');


// [解説！]ガード節になっている
if (!empty($theme) && !empty($contents)) {
    $learningManager = new LearningManager();
    $learningManager->insertUserData($contents,$theme);
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