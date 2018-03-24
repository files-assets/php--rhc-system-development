<?php

class Model
{
  protected $pdo;

  public function __construct ()
  {
    global $pdo;
    $this->pdo = $pdo;
  }

  protected function selectAll (string $tableName)
  {
    $query = $this->pdo->prepare('SELECT * FROM :table');
    $query->bindValue(':table', $tableName);
    $query->execute();

    return $query;
  }
}
