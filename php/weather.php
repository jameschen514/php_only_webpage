<?php

/**
 * Description of Index
 *
 * @author jchen
 */
// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

        
// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "api.openweathermap.org/data/2.5/weather?zip=10018&units=imperial&appid=69ae9c694d901942289b22698e3dcf61");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);


// close curl resource to free up system resources
curl_close($ch);     

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Home</title>
</head>
<body>
    <script src="static/scripts/jquery.min.js"></script>
    <script src="static/scripts/weather.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            var weatherObj = <?= $output ?>;
            var windSpeed = weatherObj.wind.speed;
            var main = weatherObj.main;
            var temp = main.temp;
            var feels_like = main.feels_like;
            var temp_min = main.temp_min;
            var temp_max = main.temp_max;
            var pressure = main.pressure;
            var humidity = main.humidity;
            
            $("body").html("Temperature: " + temp + "<br />" + "Feels like: " + feels_like + "<br />" + "Min temperature: " + temp_min + "<br />" + "Max temperature: " + temp_max + "<br />" + "Pressure: " + pressure + "<br />" + "Humidity: " + humidity);
        });
    </script>
</body>
</html>

