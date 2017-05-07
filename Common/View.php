<?php

namespace App\Common;

/**
 * View.
 */
class View {

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
   * Render page.
   *
   * @param string $template
   * @return string
   */
  public function render($template) {
    foreach ($this->data as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include __DIR__ . '/../View/' . $template;
    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;
  }

  /**
   * Display page.
   *
   * @param string $template
   */
  public function display($template) {
    echo $this->render($template);
  }
}
