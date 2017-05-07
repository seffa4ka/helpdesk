<?php

namespace App\Controller;

use App\Model\Task;
use App\Common\View;
use \Imagick;

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
        $tmpFile = $_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($tmpFile); 

        if ($width -->= 320 && $height >= 240) {
          $image = new Imagick($tmpFile);
          $image->thumbnailImage(320, 240);
          $image->writeImage($uploadfile);
        }
        else {
          move_uploaded_file($tmpFile, $uploadfile);
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
    if(!$id) {
      $id = 1;
    }
    $records = 3;
    $resId = ($id * $records) - $records;
    if (!empty($_COOKIE['filter'])) {
      $order = $_COOKIE['filter'];
    } else {
      $order = 'name';
    }
    $sum = 3;
    $model = Task::findPage($resId, $order, $sum);
    $model2 = Task::count();
    $view->items = $model;
    $view->pages = ceil($model2 / $records);
    $view->thisPage = $id;
    $view->display('task/tasks.php');
  }

  /*
   * Login action.
   */
  public function actionLogin() {
    if (isset($_SESSION['auth'])) {
      header('Location: .');
    } else {
      $view = new View();
      if ($_POST) {
        $config = parse_ini_file('config/main.ini');
        if ($_POST['login'] == $config['login'] && $_POST['password'] == $config['authpassword']) {
          $_SESSION['auth'] = $_POST['login'];
          header('Location: .');
        } else {
          $view->error = 'Invalid login or password.';
        }
      }
      $view->display('task/login.php');
    }
  }

  /*
   * Logout action.
   */
  public function actionLogout() {
    unset($_SESSION['auth']);
    header('Location: .');
  }
}
