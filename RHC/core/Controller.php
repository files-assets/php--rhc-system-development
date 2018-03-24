<?php

class Controller
{
  public function render (string $name, array $data = [], bool $loadBase = true, bool $requireTemplate = true)
  {
    $u = new User();
    $a = new Auth();
    
    extract($data, EXTR_SKIP);

    if (!$requireTemplate) {
      require 'views/' . $name . '.php';

      return false;
    }

    if (!$loadBase) {
      require 'views/templates/secondary-template.php';
    } else {
      require 'views/templates/primary-template.php';
    }

    return true;
  }

  public function renderInTemplate (string $name, array $data = [])
  {
    $u = new User();
    $a = new Auth();

    extract($data, EXTR_SKIP);

    require 'views/' . $name . '.php';

    return true;
  }
}
