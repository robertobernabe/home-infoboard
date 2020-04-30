<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CalendarTest extends TestCase
{
    protected $instance;

    protected function setUp(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/basic.ics";
        $this->instance  = new Calendar($testFilePath);
    }


    public function testCreateCalendarInstanceOfString(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/basic.ics";
        $this->assertInstanceOf(
            Calendar::class,
            Calendar::fromString($testFilePath)
        );
    }

    public function testCreateCalendarInstance(): void
    {
        $this->assertInstanceOf(
            Calendar::class,
            $this->instance
        );
    }
}
