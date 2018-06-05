<?php

function space($it = 1, $return_output = false) {
  $space = '';
  for ($i = 0; $i < $it; $i++) {
    if ($return_output) {
      $space .= "&nbsp;";
    } else {
      echo "&nbsp;";
    }
  }
  $result = ($return_output) ? $space : '';
  return $result;
}
