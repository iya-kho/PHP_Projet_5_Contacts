<?php

/*
Define the class allowing to connect to the database and to get the PDO instance
*/

class DBConnect
{
  private static $instance = null;

  private $pdo;

  private function __construct()
  {
    $this->pdo = new PDO(
      'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
      DB_USER,
      DB_PASSWORD
    );
  }

  //Instanciation of the class
  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  //Get the PDO instance
  public function getPDO()
  {
    return $this->pdo;
  }

}
