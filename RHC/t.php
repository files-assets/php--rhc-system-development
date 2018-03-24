<?php

$array = [
  'luiz' => 'felipe',
  'isabela' => 'mula'
];

echo '<Strong>Sim?</strong><Br><Br>';
echo '?';
var_dump(array_key_exists('Luiz', $array));

echo '<b>'. htmlspecialchars('<strong>Oi</strong>') .'</b>';
