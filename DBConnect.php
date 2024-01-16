<?php

class DBConnect
{
  public function __construct(private string $dbName, private string $pw) {
    $this->$dbName = $dbName;
    $this->$pw = $pw;
  }

  public function getPDO(): PDO {
    try {
      return new PDO(
        'mysql:host=localhost;dbname=' . $this->dbName . ';charset=utf8',
        'root',
        $this->pw
      );
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }

  public function __invoke(): PDO {
    return $this->getPDO();
  }

}
 ?>
