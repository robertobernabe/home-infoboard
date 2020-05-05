<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RssFeedsTest extends TestCase
{
    protected $instance;

    protected function setUp(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/basic.ics";

        $RSS_FEED_URLS = array(
            "http://newsfeed.zeit.de/index",
        );

        $this->instance  = new RssFeeds($RSS_FEED_URLS);
    }

    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(
            RssFeeds::class,
            $this->instance
        );
    }
}
