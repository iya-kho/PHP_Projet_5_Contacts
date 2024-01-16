<?php

/*
Définir la classe permettant la connexion à la base de données et la récupération de l'instance PDO
en utilisant le pattern Singleton
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

  //instanciation de la classe
  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  //récupération de l'objet PDO
  public function getPDO()
  {
    return $this->pdo;
  }

}
 ?>
