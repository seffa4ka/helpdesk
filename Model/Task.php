<?php

namespace App\Model;

use App\Common\Model;

/**
 * Class Task
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $text
 * @property $image
 * @property $status
 */
class Task 
  extends Model {

  static protected $table = 'task';

}
