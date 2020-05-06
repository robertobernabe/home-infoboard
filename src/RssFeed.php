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

    public function getDayDataFrom(int $fromTimestamp, int $toTimestamp = null): array
    {
        $fromDate = date("Y-m-d", $fromTimestamp);
        $toDate = null;
        if ($toTimestamp) {
            $toDate = date("Y-m-d", $toTimestamp);
        }
        $data = array();
        foreach ($this->entries as $entry) {
            $dt = strtotime(strval($entry->pubDate));
            $entryDate = date("Y-m-d", $dt);
            if ($entryDate  == $fromDate) {
                array_push($data, $entry);
            }
            if ($toDate && $entryDate > $fromDate && $entryDate <= $toDate) {
                array_push($data, $entry);
            }
        }
        return $data;
    }

    public function getDayDataToday(): array
    {
        return $this->getDayDataFrom(strtotime('today+00:00'));
    }
}
