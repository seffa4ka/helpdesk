<?php

namespace App\Common;

use App\Common\DB;
use App\Common\ModelExeption;

/**
 * Abstract Model. 
 */
abstract class Model {

  static protected $table;

  /**
   * Find one task by id.
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
    throw new ModelExeption('Task not found.');
  }
}
