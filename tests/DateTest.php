<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DateTest extends TestCase
{
    public function test_2000_01_10(): void
    {
        $this->assertSame(validate_date(2000, 1, 10), true);
    }

    public function test_2000_00_10(): void
    {
        $this->assertSame(validate_date(2000, 0, 10), false);
    }

    public function test_2000_01_00(): void
    {
        $this->assertSame(validate_date(2000, 1, 0), false);
    }

    public function test_2000_13_10(): void
    {
        $this->assertSame(validate_date(2000, 13, 10), false);
    }

    public function test_2000_01_40(): void
    {
        $this->assertSame(validate_date(2000, 1, 40), false);
    }

    public function test_2001_02_29(): void
    {
        $this->assertSame(validate_date(2001, 2, 29), false);
    }
}