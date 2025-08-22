<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LeapTest extends TestCase
{
    public function test1900(): void
    {
        $this->assertSame(is_leap_year(1900), false);
    }

    public function test2000(): void
    {
        $this->assertSame(is_leap_year(2000), true);
    }

    public function test2001(): void
    {
        $this->assertSame(is_leap_year(2001), false);
    }

    public function test2004(): void
    {
        $this->assertSame(is_leap_year(2004), true);
    }
}