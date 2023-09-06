<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\LearningManager;

$learningManager = new LearningManager();
$id = filter_input(INPUT_GET, 'id');
$learningManager->deleteUser($id);

header('Location: ./index.php');
exit();
?>
