<?php

namespace App\Controller;

use App\Model\Task;
use App\Common\View;

/**
 * Main Controller.
 */
class mainController {
  
  /**
   * Main action.
   *
   * First page.
   */
  public function actionMain() {
    echo 'Main';   
  }

  /**
   * Create action.
   *
   * Page for create task.
   */
  public function actionCreate() {
    echo 'Create';   
  }

  /**
   * Task action.
   *
   * To view the task.
   * @param int $id
   *  Task.
   */
  public function actionTask($id) {
    $model = Task::findOne($id);
    $view = new View();
    $view->item = $model;
    $view->display('task/task.php');
  }

  /**
   * Tasks action.
   *
   * To view the pages with tasks.
   * @param int $id
   *  Page.
   */
  public function actionTasks($id) {
    if ($id) {
      echo 'Task page = ' . $id . '.';
    } else {
      echo 'Task page = 1.';
    }    
  }
}
