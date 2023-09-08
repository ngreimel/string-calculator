<?php

declare(strict_types=1);

class StringCalculator
{
  public static function add(string $string): string
  {
    $invalidInputMsg = self::validateInput($string);
    if (!empty($invalidInputMsg)) {
      return $invalidInputMsg;
    }

    $sanitizedString = str_replace([' ', "\n"], ['', ','], $string);
    $values = explode(',', $sanitizedString);
    return (string) (array_sum($values));
  }

  protected static function validateInput(string $string): string | null
  {
    $invalidDelimiter = self::validateDelimiters($string);
    
    if (!empty($invalidDelimiter)) {
      return $invalidDelimiter;
    }

    $invalidEnding = self::validateEndingDelimiter($string);

    if (!empty($invalidEnding)) {
      return $invalidEnding;
    }

    return null;
  }

  protected static function validateDelimiters(string $string): string | null
  {
    if (preg_match('/[,\n]{2}/', $string, $matches, PREG_OFFSET_CAPTURE)) {
      $offendingCharacter = str_replace("\n", '\n', substr($matches[0][0], 1));
      $position = $matches[0][1] + 1;
      return "Number expected but '{$offendingCharacter}' found at position {$position}.";
    }
    return null;
  }

  protected static function validateEndingDelimiter(string $string): string | null
  {
    if (preg_match('/[,\n]{1}$/', $string)) {
      return 'Number expected but EOF found.';
    }
    return null;
  }
}
