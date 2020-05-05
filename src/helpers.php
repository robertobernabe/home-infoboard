<?php
/* 

require __DIR__ . '/../vendor/autoload.php';
include '/../vendor/autoload.php';

use Sabre\VObject;
use Sabre\VObject\Component\VEvent;

$vcalendar = \Sabre\VObject\Reader::read(fopen('basic.ics', 'r'));

foreach ($vcalendar->VEVENT as $item) {
    echo $item->SUMMARY . " ";
    echo $item->DTSTART->getDateTime()->format(\DateTime::ATOM) . "\n";
} */

require __DIR__ . '/../vendor/autoload.php';
//include '/../vendor/autoload.php';

$OPEN_WEATHER_API_KEY = "5d524f5a27a08057dc4a328dd02eb39d";
$CITY = "Ravensburg,DE";

$RSS_FEED_URLS = array(
    "http://newsfeed.zeit.de/index",
);


function do_json_request($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    return json_decode($response);
}


function get_weather_forecast($City)
{
    global $OPEN_WEATHER_API_KEY;
    $url = "http://api.openweathermap.org/data/2.5/forecast?q={$City}&appid={$OPEN_WEATHER_API_KEY}&units=metric&lang=de";
    return do_json_request($url);
}


function get_weather($City)
{
    global $OPEN_WEATHER_API_KEY;
    $url = "http://api.openweathermap.org/data/2.5/weather?q={$City}&appid={$OPEN_WEATHER_API_KEY}&units=metric&lang=de";
    return do_json_request($url);
}

$loc_de = setlocale(LC_ALL, 'de_DE@euro', 'de_DE', 'deu_deu');
#echo "Preferred locale for german on this system is '$loc_de'";
#echo '<br/>' . strftime("%A %d %B %Y", mktime(0, 0, 0, 12, 22, 1978));

$weather_data_forecast = get_weather_forecast($CITY);
$weather_data = new OpenWeatherMapWeatherJson(get_weather($CITY));
$currentTime = time();
//var_dump($weather_data);
$rssFeeds = new RssFeeds($RSS_FEED_URLS);
