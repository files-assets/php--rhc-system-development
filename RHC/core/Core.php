<?php

class Core
{
  public function __construct ()
  {
    /*$u = new User();
    $a = new Auth();*/
  }

  public function init ()
  {

    # Definições iniciais:
    $url    = '/';
    $params = [];

    if (isset($_GET['url'])) {
      $url = explode('/', $_GET['url']);
    }

    if (!empty($url) && $url !== '/') {

      $currentController = $url[0] . 'Controller';

      if (isset($url[1]) && !empty($url[1])) {
        $currentAction = $url[1];
      } else {
        $currentAction = 'index';
      }

      array_shift($url);
      array_shift($url);

      if (count($url) > 0) {
        $params = $url;
      }

    } else {
      $currentController = 'IndexController';
      $currentAction = 'index';
    }

    if (!file_exists('controllers/' . $currentController . '.php') || !method_exists($currentController, $currentAction)) {
      $currentController = 'Error404Controller';
      $currentAction = 'index';
    }

    $controller = new $currentController();
    call_user_func_array([$controller, $currentAction], $params);
  }
}
