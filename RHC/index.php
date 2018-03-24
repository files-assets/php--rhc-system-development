<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

date_default_timezone_set('America/Sao_Paulo');

require 'config/config.php';

spl_autoload_register(function ($class) {
  if (file_exists('controllers/'. $class .'.php')) {
    require 'controllers/'. $class .'.php';
  } elseif (file_exists('models/'. $class .'.php')) {
    require 'models/'. $class .'.php';
  } elseif (file_exists('core/'. $class .'.php')) {
    require 'core/'. $class .'.php';
  }
});

$core = new Core();
$core->init();
