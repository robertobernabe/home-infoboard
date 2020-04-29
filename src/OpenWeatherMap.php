<?php declare(strict_types=1);

use phpDocumentor\Reflection\Types\Integer;

final class OpenWeatherMap
{
    private $appId;
    private $city;

    public function __construct(string $appId, string $city)
    {
        $this->appId = $appId;
        $this->city = $city;
    }

    public function __toString(): string
    {
        return "OpenWeatherMap: ". $this->city;
    }
}

final class OpenWeatherMapWeatherJson
{
    private $json;

    public function __construct(object $json)
    {
        $this->json = $json;

    }

    public function __toString(): string
    {
        return "OpenWeatherMapWeather: ". $this->city;
    }

    public function getName(): string {
        return $this->json->name;
    }

    public function getDescription(): string {
        return $this->json->weather[0]->description;
    }

    public function getWeatherIcon(): string {
        $icon = $this->json->weather[0]->icon;
        $url = "http://openweathermap.org/img/w/${icon}.png";
        return $url;
    }

    public function getTemperatureMin(): float {
        $value = $this->json->main->temp_min;
        return $value;
    }

    public function getTemperatureMax(): float {
        $value = $this->json->main->temp_max;
        return $value;
    }

}

final class OpenWeatherMapForecastJson
{
    private $json;

    public function __construct(object $json)
    {
        $this->json = $json;

    }

    public function __toString(): string
    {
        return "OpenWeatherMapForecast: ". $this->city;
    }

    public function getName(): string {
        return $this->json->name;
    }

    public function getDescription(): string {
        return $this->json->weather[0]->description;
    }

    public function getWeatherIcon(): string {
        $icon = $this->json->weather[0]->icon;
        $url = "http://openweathermap.org/img/w/${icon}.png";
        return $url;
    }

    public function getTemperatureMin(): float {
        $value = $this->json->main->temp_min;
        return $value;
    }

    public function getTemperatureMax(): float {
        $value = $this->json->main->temp_max;
        return $value;
    }


}