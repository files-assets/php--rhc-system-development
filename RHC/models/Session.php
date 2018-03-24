<?php

/**
 * @method __construct;
 *
 * - Sessão:
 *   @method session
 *
 * - Auxiliares:
 *   @method isLogged
 *   @method hasPermission
 *
 * - Setters:
 *   @method setBaseUser
 *
 * - Getters.
 */

class Session extends Model
{

  private $type;
  private $data = [];
  private $result = [ 'on_idle' => true ];

  public function __construct (string $type)
  {
    parent::__construct();

    $this->type = $type;
  }

  public function setData (array $data)
  {
    $this->data = $data;
  }

  private function setResult (bool $status, string $response)
  {
    $this->result = [
      'status'   => $status,
      'response' => $response
    ];
  }

  private function execute ()
  {
    switch ($this->type) {
      case 'login':
        $this->login();
        break;

      case 'register':
        $this->register();
        break;

      case 'logout':
        $this->logout();
        break;

      default:
        $this->setResult(false, 'O parâmetro de sessão passado é inválido ou inexistente.');
    }
  }

  public function result ()
  {
    $this->execute();

    if (isset($this->result['on_idle'])) {
      $this->setResult(false, 'Nenhum parâmetro de sessão foi passado.');
    }

    return $this->result;
  }

  # Funções de sessão em si:

  private function login ()
  {
    if (
      !array_key_exists('username', $this->data) || empty($this->data['username']) ||
      !array_key_exists('password', $this->data) || empty($this->data['password']) ||
      !array_key_exists('token', $this->data) || empty($this->data['token'])
    ) {
      $this->setResult(false, 'Complete todos os campos para fazer o login.');
      return false;
    }

    $query = $this->pdo->prepare('
      SELECT * FROM userlist
        WHERE
      username = :username
    ');
    $query->bindValue(':username', $this->data['username']);
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$query->rowCount()) {
      $this->setResult(false, 'Usuário inexistente.');
      return false;
    }

    $this->data['password'] = hash('sha256', $this->data['password']);

    if ($this->data['password'] !== $row['password']) {
      $this->setResult(false, 'Usuário e/ou senha incorreto(s).');
      return false;
    }

    if (intval($row['active']) === 0) {
      $this->setResult(false, 'Usuário inativo.');
      return false;
    }

    $ban = new BanManager($row['username']);
    if ($ban->getStatus()) {
      $perm_date = date('d/m/Y \à\s H:i:s', $ban->getBanUntil());
      $format = 'Você foi banido. Usuário %s banido por %d dia(s) pelo motivo: <b>%s</b>. Você está banido até o dia %s.';
      $this->setResult(false, sprintf($format, $ban->getUsername(), $ban->getBanDays(), $ban->getMessage(), $perm_date));
      return false;
    }

    $a = new Auth();
    if (!$a->compareToken($this->data['token'])) {
      $this->setResult(
        false,
        'O token é inválido ou inexistente. Se persistir, <a href="javascript:location.reload();" class="alert-link">atualize a página</a>.'
      );
      return false;
    }

    $this->setResult(true, 'Logado com sucesso! Aguarde o redirecionamento...');

    $u = new User();
    $u->setLoggedSession($row['username']);

    return true;
  }
}
