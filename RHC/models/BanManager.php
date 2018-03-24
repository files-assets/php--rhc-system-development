<?php

class BanManager extends Model
{
  private $status    = null; /** @var boolean $status  - True if the user is banned. */
  private $username  = null; /** @var string $username - The banned username. */
  private $stat_date = null; /** @var int $stat_date   - The ban's start date. */
  private $ban_days  = null; /** @var int $ban_days    - Ban's duration (in days). */
  private $ban_until = null; /** @var int $ban_until   - Timestamp do final do banimento. */
  private $message   = null; /** @var string $message  - Ban's reason. */
  private $author    = null; /** @var string $author   - The ban's author username. */

  /**
   * @return void
   * @param string $username - Name of the user that will be checked.
   */
  public function __construct (string $username)
  {
    parent::__construct();

    $this->username = $username;
    $this->verify($username);
  }

  /**
   * @return boolean - True if the user is banned.
   */
  private function verify ()
  {
    $query = $this->pdo->prepare('
      SELECT * FROM banlist
        WHERE
      banned_username = :username
    ');
    $query->bindValue(':username', $this->username);
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$query->rowCount()) {
      $this->status = false;
      return;
    }

    $term  = (intval($row['banned_days']) === 1) ? 'day' : 'days';
    $count = '+ '. $row['banned_days'] . $term;

    if (strtotime($count, intval($row['ban_start'])) < time()) {
      $this->removeBanned($row['banned_username']);

      $this->status = false;
      return;
    }

    $this->status    = true;
    $this->username  = $row['banned_username'];
    $this->stat_date = $row['ban_start'];
    $this->ban_days  = $row['banned_days'];
    $this->ban_until = strtotime($count, intval($row['ban_start']));
    $this->message   = $row['message'];
    $this->author    = $row['ban_author_username'];
    return;
  }

  private function removeBanned (string $username)
  {
    $query = $this->pdo->prepare('
      DELETE FROM banlist
        WHERE
      banned_username = :username
    ');
    $query->bindValue(':username', $username);
    $query->execute();
  }

  public function getStatus () { return $this->status; }
  public function getUsername () { return $this->username; }
  public function getStartDate () { return $this->stat_date; }
  public function getBanDays () { return $this->ban_days; }
  public function getBanUntil () { return $this->ban_until; }
  public function getMessage () { return $this->message; }
  public function getAuthor () { return $this->author; }
}
