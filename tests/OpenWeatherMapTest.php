<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class OpenWeatherMapWeatherTest extends TestCase
{

    protected $instance;

    protected function setUp(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/openweathermap_weather_example.json";
        $json = json_decode(file_get_contents($testFilePath));
        $this->instance  = new OpenWeatherMapWeatherJson($json);
    }

    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(
            OpenWeatherMapWeatherJson::class,
            $this->instance
        );
    }

    public function testGetTemperatures(): void
    {
        $this->assertEquals($this->instance->getTemperatureMax(), 16);
        $this->assertEquals($this->instance->getTemperatureMin(), 13.89);
    }

    public function testGetIcon(): void
    {
        $this->assertEquals("http://openweathermap.org/img/w/10d.png", $this->instance->getWeatherIcon());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->instance->getDescription(), "Leichter Regen");
    }
}

final class OpenWeatherMapForecastTest extends TestCase
{

    protected $instance;

    protected function setUp(): void
    {
        $HERE = dirname(__FILE__);
        $testFilePath = "{$HERE}/data/openweathermap_forecast_example.json";
        $json = json_decode(file_get_contents($testFilePath));
        $this->instance  = new OpenWeatherMapForecastJson($json);
    }


    public function testCreateInstance(): void
    {
        $this->assertInstanceOf(
            OpenWeatherMapForecastJson::class,
            $this->instance
        );
    }

    public function testCreateDayData(): void
    {
        $data = $this->instance->getDayDataFrom(strtotime("2020-04-28"));
        $this->assertIsArray($data);
        $this->assertEquals(3, count($data));


        $data = $this->instance->getDayDataFrom(strtotime("2020-04-29"));
        $this->assertIsArray($data);
        $this->assertEquals(8, count($data));

        $data = $this->instance->getDayDataFrom(strtotime("2020-04-28"), strtotime("2020-04-29"));
        $this->assertIsArray($data);
        $this->assertEquals(8 + 3, count($data));
    }
}
