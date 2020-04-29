<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CalendarTest extends TestCase
{
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
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/basic.ics";
        $cal = new Calendar($testFilePath);
        $this->assertInstanceOf(
            Calendar::class,
            $cal
        );
    }
}
