<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PeselTest extends TestCase
{
    public function test_good(): void
    {
        $this->assertSame(validate_pesel('99121212342'), true);
    }

    public function test_to_short(): void
    {
        $this->assertSame(validate_pesel('123'), false);
    }

    public function test_empty(): void
    {
        $this->assertSame(validate_pesel(''), false);
    }

    public function test_letters(): void
    {
        $this->assertSame(validate_pesel('asd'), false);
    }

    public function test_to_long(): void
    {
        $this->assertSame(validate_pesel('123123123123'), false);
    }

    public function test_month_to_high(): void
    {
        $this->assertSame(validate_pesel('30130100000'), false);
    }

    public function test_month_to_high_2(): void
    {
        $this->assertSame(validate_pesel('30930100000'), false);
    }

    public function test_days_to_high(): void
    {
        $this->assertSame(validate_pesel('30033200000'), false);
    }

    public function test_days_to_low(): void
    {
        $this->assertSame(validate_pesel('30030000000'), false);
    }

    public function test_month_to_low(): void
    {
        $this->assertSame(validate_pesel('30000100000'), false);
    }

    public function test_bad_control_digit(): void
    {
        $this->assertSame(validate_pesel('99120112340'), false);
    }
}