<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DaysInMonthByYearTest extends TestCase
{
    public function test1900_1(): void
    {
        $this->assertSame(days_in_month_by_year(1900, 1), 31);
    }

    public function test2000_1(): void
    {
        $this->assertSame(days_in_month_by_year(2000, 1), 31);
    }

    public function test2001_1(): void
    {
        $this->assertSame(days_in_month_by_year(2001, 1), 31);
    }

    public function test2004_1(): void
    {
        $this->assertSame(days_in_month_by_year(2004, 1), 31);
    }

    public function test1900_2(): void
    {
        $this->assertSame(days_in_month_by_year(1900, 2), 28);
    }

    public function test2000_2(): void
    {
        $this->assertSame(days_in_month_by_year(2000, 2), 29);
    }

    public function test2001_2(): void
    {
        $this->assertSame(days_in_month_by_year(2001, 2), 28);
    }

    public function test2004_2(): void
    {
        $this->assertSame(days_in_month_by_year(2004, 2), 29);
    }
}