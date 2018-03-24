<?php

class Auth extends Model
{

  private $token; /** @var string $token - Corresponde ao token da sessão. */

  /**
   * @return void
   */
  public function __construct ()
  {
    if (!isset($_SESSION['ccToken']) || empty($_SESSION['ccToken'])) {
      $_SESSION['ccToken'] = $this->generateToken();
    }

    $this->token = $_SESSION['ccToken'];
  }

  /**
   * @return string - Token gerado.
   */
  private function generateToken ()
  {
    return hash('sha256', rand(0, 9999) . time() . rand(0, 9999) . hash('sha256', time() . rand(0, 9999)));
  }

  /**
   * @return string - Token.
   */
  public function getToken ()
  {
    return $this->token;
  }

  /**
   * @return boolean - True if the user token is the same of the original token.
   * @param string $userToken - Corresponde ao token que vai ser comparado.
   */
  public function compareToken (string $userToken)
  {
    if ($this->token === $userToken) {
      return true;
    }

    return false;
  }

  public function destroyToken ()
  {
    unset($_SESSION['ccToken']);
  }
}
