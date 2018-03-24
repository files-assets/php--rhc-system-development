<?php

function location (string $location, int $time = 0) {
  $location = BASE_URL . $location;

  echo '<meta http-equiv="refresh" content="' . $time . '; url=' . $location . '" />';

  $time++;
  echo '<meta http-equiv="refresh" content="' . $time . '; url=' . $location . '" />';
}

function san (string $content) {
  return htmlspecialchars(addslashes($content));
}

function debug (string $content, bool $mode = false) {
  echo '<code><pre>';
  if ($mode) {
    echo var_dump($content);
  } else {
    echo print_r($content);
  }
  echo '</pre></code>';
}
