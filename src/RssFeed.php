<?php

declare(strict_types=1);

final class RssFeeds
{
    private $feeds;
    private $entries;

    public function __construct(array $feeds)
    {
        $this->feeds = $feeds;
        $this->entries = array();
        $this->init();
    }

    private function init()
    {
        foreach ($this->feeds as $feed) {
            $xml = simplexml_load_file($feed);
            $this->entries = array_merge($this->entries, $xml->xpath("//item"));
        }

        //Sort feed entries by pubDate
        usort($this->entries, function ($feed1, $feed2) {
            return strtotime(strval($feed2->pubDate)) - strtotime(strval($feed1->pubDate));
        });
    }

    public function getEntries(): array
    {
        return $this->entries;
    }
}
