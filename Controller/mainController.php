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
    $view = new View();
    $view->display('task/main.php');   
  }

  /**
   * Create action.
   *
   * Page for create task.
   */
  public function actionCreate() {
    $view = new View();
    if ($_POST) {
      $model = new Task();
      $model->name = $_POST['name'];
      $model->email = $_POST['email'];
      $model->text = $_POST['text'];
      $model->image = '/image/' . $_POST['name'] . '/' . time() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $model->status = 0;
      $model->save();
      
      $id = $model->id;
      if ($id) {
        $view->item = 'The task was sent.';
        $view->id = $model->id;
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/image/' . $_POST['name'] . '/';
        if (!file_exists($uploaddir)){
          if (!mkdir($uploaddir, 0777, true)) {
            //Error!
          }        
        }
        $uploadfile = $_SERVER['DOCUMENT_ROOT'] . $model->image;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
          //File downloaded.
        } else {
          //Error!
        }
      } else {
        $view->item = NULL;
      }
    } else {
      $view->item = NULL;
    }
    $view->display('task/create.php');
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
    $view = new View();
    if ($id) {
      $view->item = 'Task page = ' . $id . '.';
    } else {
      $view->item = 'Task page = 1.';
    }
    $view->display('task/tasks.php');
  }

  /*
   * Login action.
   */
  public function actionLogin() {
    $view = new View();
    $view->display('task/login.php');
  }
}
