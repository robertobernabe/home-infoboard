<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RssFeedsTest extends TestCase
{
    protected $instance;

    protected function setUp(): void
    {
        $HERE = dirname(__FILE__);

        $RSS_FEED_FILES = array(
            "{$HERE}/data/newsfeed_zeit.rss",
        );

        $this->instance  = new RssFeeds($RSS_FEED_FILES);
    }

    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(
            RssFeeds::class,
            $this->instance
        );
    }

    public function testGetFeedsOfToday(): void
    {
        $data = $this->instance->getDayDataFrom(strtotime("Tue, 05 May 2020"));
        $this->assertIsArray($data);
        $this->assertEquals(9, count($data));

        $data = $this->instance->getDayDataFrom(strtotime("Wed, 06 May 2020"));
        $this->assertIsArray($data);
        $this->assertEquals(6, count($data));
    }
}
