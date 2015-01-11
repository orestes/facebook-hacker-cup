<?php

function get_max($digits, $total) {
  $max     = $digits[0];
  $max_pos = 0;

  for ($i = 1; $i < $total; $i++)
  {
    $digit = $digits[$i];
    if ($digit >= $max) {
      $max     = $digit;
      $max_pos = $i;
    }
  }

  $previous         = $digits[0];
  $digits[0]        = $max;
  $digits[$max_pos] = $previous;

  return join('', $digits);
}


function get_min($digits, $total) {
  $min     = $digits[0];
  $min_pos = 0;

  for ($i = 1; $i < $total; $i++)
  {
    $digit = $digits[$i];

    if ($digit > 0 && $digit < $min) {
      $min     = $digit;
      $min_pos = $i;
    }
  }

  $previous         = $digits[0];
  $digits[0]        = $min;
  $digits[$min_pos] = $previous;

  return join('', $digits);
}

function solve($line) {
  $total = strlen($line);
  if ($total == 1) {
    return $line.' '.$line;
  }

  $digits = str_split($line);

  $min = get_min($digits, $total);
  $max = get_max($digits, $total);

  return $min.' '.$max;
}

$input = file_get_contents('php://stdin');
$lines = explode("\n", $input); // Beware of using PHP_EOL on Windows

$total = (int)$lines[0];
for($i = 1; $i <= $total; $i++) {
 printf("Case #%d: %s\n", $i, solve($lines[$i]));
}

echo PHP_EOL;
