<?php

namespace App\Common;

use \PDO;

/**
 * Data Base.
 */
class DB {

  private $dbh;

  /**
   * Constructor.
   *
   * Connect to data base.
   */
  public function __construct() {
    try {
        $config = parse_ini_file('config/main.ini');
        $this->dbh = new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['base'],
                $config['user'],
                $config['password']
              );
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }

  /**
   * Query in data base.
   *
   * @param string $sql
   * @param object $class
   * @param array $params
   * @return array
   */
  public function query($sql, $class, $params = []) {
    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(PDO::FETCH_CLASS, $class);
  }

  /**
   * Query in data base.
   *
   * @param type $sql
   * @param type $params
   * @return type
   */
  public function queryASSOC($sql, $params = []) {
    $sth = $this->dbh->prepare($sql);
    $sth->execute($params);
    return $sth->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Execute.
   *
   * @param string $sql
   * @param array $params
   * @return boolean
   */
  public function execute($sql, $params = []) {
    $sth = $this->dbh->prepare($sql);
    return $sth->execute($params);
  }

  /**
   * LastInsertId.
   *
   * @return int
   */
  public function lastInsertId() {
    return $this->dbh->lastInsertId();
  }
}
