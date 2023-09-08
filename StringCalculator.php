<?php

declare(strict_types=1);

class StringCalculator
{
  public static function add(string $string): string
  {
    return (string) (empty($string) ? 0 : array_sum(explode(',', $string)));
  }
}

