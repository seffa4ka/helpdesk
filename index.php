<?php

/**
 * Front Controller.
 */
ini_set('display_errors','On');
require_once __DIR__ . '/Common/autoload.php';

use App\Controller\mainController;
use App\Common\View;

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$action = !empty($pathParts[1]) ? ucfirst($pathParts[1]) : 'Main';
$controller = new mainController;
$method = 'action' . $action;
if (method_exists($controller, $method)) {
  try {
    $controller->$method(!empty($pathParts[2]) ? $pathParts[2] : NULL);
  } catch (Exception $e) {
    $view = new View();
    $view->item = $e->getMessage();
    $view->display('error.php');
  }
} else {
  header("HTTP/1.0 404 Not Found");
}
