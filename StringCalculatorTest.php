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
}
