<?php

declare(strict_types=1);

require_once __DIR__ . '/StringCalculator.php';

use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
  public function testEmptyStringReturnsZero(): void
  {
    $emptyString = '';
    $this->assertSame("0", StringCalculator::add($emptyString));
  }

  public function testAcceptsOneNumber(): void
  {
    $oneNumber = '1';
    $this->assertSame($oneNumber, StringCalculator::add($oneNumber));
  }

  public function testAcceptsTwoNumbers(): void
  {
    $twoNumbers = "1,3";
    $this->assertSame("4", StringCalculator::add($twoNumbers));
  }

  public function testAcceptsTwoFloats(): void
  {
    $twoFloats = "1.1,2.2";
    $this->assertSame("3.3", StringCalculator::add($twoFloats));
  }

  public function testAcceptsTwoFloatsAndSpaces(): void
  {
    $twoFloats = "1.1        ,2.2";
    $this->assertSame("3.3", StringCalculator::add($twoFloats));
  }

  public function testAcceptsUnknownQuantityOfNumbers(): void
  {
    $manyNumbers = [];
    $limit = rand(0, 20);

    for ($i = 0; $i < $limit; $i++) {
      $manyNumbers[] = rand(0, 20);
    }

    $this->assertSame(
      (string) array_sum($manyNumbers),
      StringCalculator::add(implode(',', $manyNumbers))
    );
  }

  public function testCanHandleNewLineAsDelimiter(): void
  {
    $params = "1\n2,3";

    $this->assertSame(
      '6',
      StringCalculator::add($params)
    );
  }

  /**
   * @dataProvider delimiterAtEnd
   */
  public function testThrowsErrorForDelimiterAtEnd($input): void
  {
    $this->assertSame(
      'Number expected but EOF found.',
      StringCalculator::add($input)
    );
  }

  public static function delimiterAtEnd() 
  {
    return [
        ["1,3,"],
        ["1\n3\n"],
        ["1\n3,"],
        ["1,3\n"],
    ];
  }

  /**
   * @dataProvider invalidDelimiters
   */
  public function testThrowsErrorForDuplicateDelimiter($input, $delimiter, $position): void
  {
    $this->assertSame(
      "Number expected but '{$delimiter}' found at position {$position}.",
      StringCalculator::add($input)
    );
  }

  public static function invalidDelimiters() 
  {
    return [
        'comma/newline' => ["1,\n3", '\n', 2],
        'newline/comma' => ["1\n,3", ',', 2],
        'comma/comma' => ["1,,3", ',', 2],
        'newline/newline' => ["1\n\n3", '\n', 2],
    ];
  }
}
