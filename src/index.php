<!-- https://calendar.google.com/calendar/ical/tfsf66v9op3muh9tiadq9luod4%40group.calendar.google.com/private-0fb21def34de1b59cbc95b54c6c2e4b8/basic.ics -->
<?php
require('helpers.php')

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Home Infoboard!</title>
</head>

<body>
    <h1>Home Infoboard</h1>

    <h2>Wetter <?php echo $weather_data->getName(); ?></h2>
    <div class="weather-report-container">
        <div class="time">
            <div><?php echo date(DateTimeInterface::RFC850, $currentTime); ?></div>
        </div>
        <div class="weather-today">
            <img src="<?php echo $weather_data->getWeatherIcon(); ?>" class="weather-icon" />
            <span><?php echo $weather_data->getDescription(); ?></span>

            <span>Max: <?php echo $weather_data->getTemperatureMax(); ?>&deg;C</span>
            <span class="min-temperature">Min: <?php echo $weather_data->getTemperatureMin(); ?>&deg;C</span>
            <div>
                
            </div>
        </div>
        <div class="weather-forecast">
            <?php
                foreach($weather_data_forecast->list as $f) {
                    //var_dump($f);
                }
            ?>
        </div>
    </div>

    </div>
    <h2>Kalender</h2>
    <div class="calendar-today">

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>