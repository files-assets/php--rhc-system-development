<?php

global $pdo;

try {
  $pdo = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME, DATABASE_USER, DATABASE_PASS, DATABASE_OPTS);
} catch (PDOException $error) {
  echo '<hr />';
  echo '<h1 style="font-family: sans-serif; margin: 20px 0; text-align: center; color: orangered;">Erro!</h1>';
  echo '<hr />';
  echo '<p style="font-family: sans-serif;"><strong>Houve um problema durante a conexão com o banco de dados.</strong></p>';
  echo '<p style="font-family: sans-serif;">Tente alterar os valores no arquivo <samp>config/constants.php</samp> na raiz do projeto.</p>';
  echo '<hr />';
  echo '<p style="font-family: sans-serif;">Erro detalhado:</p>';
  echo '<pre style="font-family: monospace;">' . $error->getMessage() . '</pre>';
  echo '<hr />';
  echo '<p style="font-family: sans-serif; text-align: center;">Copyright &copy; <strong>' . NAME . '</strong>, ' . date('Y', time()) . '</p>';
  echo '<hr />';

  exit;
}
