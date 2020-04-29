<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class OpenWeatherMapTest extends TestCase
{
    public function testCreateOpenWeatherMapWeatherInstance(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/openweathermap_weather_example.json";
        $json = json_decode(file_get_contents($testFilePath));
        $ow  = new OpenWeatherMapWeatherJson($json);
        $this->assertInstanceOf(
            OpenWeatherMapWeatherJson::class,
            $ow
        );

        $this->assertEquals($ow->getTemperatureMax(), 16);
        $this->assertEquals($ow->getTemperatureMin(), 13.89);
        $this->assertEquals("http://openweathermap.org/img/w/10d.png", $ow->getWeatherIcon());
        $this->assertEquals("http://openweathermap.org/img/w/10d.png", $ow->getWeatherIcon());
        echo $ow->getWeatherIcon();
        $this->assertEquals($ow->getDescription(), "Leichter Regen");
    }

    public function testCreateOpenWeatherMapForecastInstance(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/openweathermap_forecast_example.json";
        $json = json_decode(file_get_contents($testFilePath));
        $ow  = new OpenWeatherMapForecastJson($json);
        $this->assertInstanceOf(
            OpenWeatherMapForecastJson::class,
            $ow
        );

        $data = $ow->getDayDataFrom(strtotime("2020-04-28"));
        $this->assertIsArray($data);
        $this->assertEquals(3, count($data));


        $data = $ow->getDayDataFrom(strtotime("2020-04-29"));
        $this->assertIsArray($data);
        $this->assertEquals(8, count($data));

        $data = $ow->getDayDataFrom(strtotime("2020-04-28"), strtotime("2020-04-29"));
        $this->assertIsArray($data);
        $this->assertEquals(8 + 3, count($data));
    }
}
