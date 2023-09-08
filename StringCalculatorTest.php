<?php

declare(strict_types=1);

require_once __DIR__ . '/StringCalculator.php';

use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    public function testEmptyStringReturnsZero(): void
    {
        $this->assertSame(0, StringCalculator::add());
    }
}
