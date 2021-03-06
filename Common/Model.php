<?php

namespace App\Common;

use App\Common\DB;
use App\Common\ModelExeption;

/**
 * Abstract Model. 
 */
abstract class Model {

  static protected $table;
  protected $data = [];

  /**
   * __set.
   *
   * @param type $name
   * @param type $value
   */
  public function __set($name, $value) {
    $this->data[$name] = $value;
  }

  /**
   * __get.
   *
   * @param type $name
   * @return type
   */
  public function __get($name) {
    return $this->data[$name];
  }

  /**
   * __isset
   *
   * @param type $name
   * @return type
   */
  public function __isset($name) {
    return isset($this->data[$name]);
  }

  /**
   * Find one data by id.
   *
   * @param int $id
   *  Task.
   * @return object
   * @throws ModelExeption
   */
  public static function findOne($id) {
    $db = new DB();
    $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
    $res = $db->query($sql, get_called_class(), [':id' => $id]);
    if (!empty($res)) {
      return $res[0];
    }
    throw new ModelExeption('Data not found.');
  }

  /**
   * Find page.
   *
   * @param int $id
   * @param string $order
   * @param int $sum
   * @return object
   * @throws ModelExeption
   */
  public static function findPage($id, $order, $sum) {
    $db = new DB();
    $sql = 'SELECT * FROM ' . static::$table
            . ' ORDER BY ' . $order
            . ' LIMIT ' . $id . ', ' . $sum;
    $res = $db->query($sql, get_called_class());
    if (!empty($res)) {
      return $res;
    }
    throw new ModelExeption('Data not found.');
  }

  /**
   * Count string in data base.
   *
   * @return type
   * @throws ModelExeption
   */
  public function count() {
    $db = new DB();
    $sql = 'SELECT COUNT(*) FROM ' . static::$table;
    $res = $db->queryASSOC($sql);
    if (!empty($res)) {
      return $res[0]['COUNT(*)'];
    }
    throw new ModelExeption('Data not found.');
  }

  /**
   * Insert data.
   */
  protected function insert() {
    $cols = array_keys($this->data);
    $data = [];
    foreach ($cols as $col) {
      $data[':' . $col] = $this->data[$col];
    }
    $sql = 'INSERT INTO ' . static::$table . ' '
            . '(' . implode(', ', $cols) . ')'
            . ' VALUES '
            . '(' . implode(', ', array_keys($data)) . ')';
    $db = new DB();
    $db->execute($sql, $data);
    $this->id = $db->lastInsertId();
  }

  /**
   * Update data.
   */
  protected function update() {
    $cols = [];
    $data = [];
    foreach ($this->data as $name => $value) {
      $data[':' . $name] = $value;
      if ('id' === $name) {
        continue;
      }
      $cols[] = $name . '=:' . $name;
    }
    $sql = 'UPDATE ' . static::$table . ' '
            . 'SET ' . implode(', ', $cols) . ' '
            . 'WHERE id=:id';
    $db = new DB();
    $db->execute($sql, $data);
  }

  /**
   * Save = Insert or Update.
   */
  public function save() {
    if (!isset($this->id)) {
      $this->insert();
    } else {
      $this->update();
    }
  }
}
