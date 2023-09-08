<?php

declare(strict_types=1);

class StringCalculator
{
  public static function add(string $string): string
  {
    $values = explode(',',str_replace(' ','',$string));
    return (string) (array_sum($values));
  }
}

