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

}
