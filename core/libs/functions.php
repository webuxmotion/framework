<?php

function debug($val, $die = false) {
  echo '<pre>' . print_r($val, true) . '</pre>';
  if ($die) die();
}
