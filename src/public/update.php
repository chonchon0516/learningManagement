<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\LearningManager;

$id = filter_input(INPUT_POST, 'id');
$theme = filter_input(INPUT_POST, 'theme');
$contents = filter_input(INPUT_POST, 'contents');

if (!empty($theme) && !empty($contents)) {
    $learningManager = new LearningManager();
    $learningManager->updateUser($id,$theme,$contents);

    header('Location: ./index.php');
    exit();
}
$error = 'タイトルまたは本文が入力されていません';


?>

<body>
  <div>
    <p><?php echo $error . "\n"; ?></p>
    <a href="./index.php">
        <p>トップページへ</p>
    </a>
  </div>
</body>
