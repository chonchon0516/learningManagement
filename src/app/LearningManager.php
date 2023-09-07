<?php
namespace App;
use PDO;

class LearningManager 
{
  private $pdo;
  
  public function __construct() 
  {
    $dbUserName = 'root';
    $dbPassword = 'password';
    $this->pdo = new PDO(
    'mysql:host=mysql; dbname=learningmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
    );
  }
  public function fetchAllLearningnotes()
  {
    $sql = "SELECT * FROM learningnotes";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    $notes = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $notes;
  }
  public function findById($id)
  {
    $sql = "SELECT * FROM learningnotes where id = $id";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    $note = $statement->fetch();
    return $note;
  }
  public function deleteUser($id)
  {
    $sql = "DELETE FROM learningnotes where id = $id";
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
  }
  public function updateUser($id,$theme,$contents)
  {
    $sql = 'UPDATE learningnotes SET theme=:theme, contents=:contents WHERE id = :id';
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':theme', $theme, PDO::PARAM_STR);
    $statement->bindValue(':contents', $contents, PDO::PARAM_STR);
    $statement->execute();
  }
  public function insertUserData($contents,$theme)
  {
    $sql = 'INSERT INTO `learningnotes`(`theme`, `contents`) VALUES(:theme, :contents)';
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':theme', $theme, PDO::PARAM_STR);
    $statement->bindValue(':contents', $contents, PDO::PARAM_STR);
    $statement->execute();


  }
  
}
