<?php

/**
 * @method __construct;
 *
 * - Sessão:
 *   @method session
 *
 * - Auxiliares:
 *   @method isLogged
 *   @method isBanned
 *   @method hasPermission
 *
 * - Setters:
 *   @method setBaseUser
 *
 * - Getters.
 */

class User extends Model
{

  private $id;
  private $username;
  private $groups_string;
  private $groups = [];
  private $patent_id;
  private $patent;
  private $register_date;
  private $last_visit;
  private $cookie_session;
  private $active;

  /**
   * @return void
   */
  public function __construct ()
  {
    parent::__construct();

    //$this->setBaseUser();
  }

  /**
   * @return array
   * @param string $type - Action's type.
   * @param array  $data - Action's data.
   */
  public function session (string $type, array $data = [])
  {
    $session = new Session ($type);
    $session->setData($data);

    return $session->result(); /** @return aray */
  }

  /**
   * @return boolean
   */
  public function isBanned ()
  {
    if (!$this->isLogged()) {
      return false;
    }

    $ban = new BanManager($this->username);
    return $ban->getStatus();
  }

  /**
   * @return boolean
   */
  public function isLogged ()
  {
    if (isset($_SESSION['ccLogged']) && !empty($_SESSION['ccLogged'])) {
      return true;
    }

    return false;
  }
}
