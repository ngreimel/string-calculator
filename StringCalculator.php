<?php

declare(strict_types=1);

class StringCalculator
{
  public static function add(string $string): string
  {
    $invalid = self::validateDelimiters($string);

    if (!empty($invalid)) {
      return $invalid;
    }

    $values = explode(',', str_replace([' ', "\n"], ['', ','], $string));
    return (string) (array_sum($values));
  }

  protected static function validateDelimiters(string $string)
  {
    if (preg_match('/[,\n]{2}/', $string, $matches, PREG_OFFSET_CAPTURE)) {
      $offendingCharacter = str_replace("\n", '\n', substr($matches[0][0], 1));
      $position = $matches[0][1] + 1;
      return "Number expected but '{$offendingCharacter}' found at position {$position}.";
    }
    return null;
  }
}
