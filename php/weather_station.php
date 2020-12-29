<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of weather_station
 *
 * @author jchen
 */

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

//echo $output;

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: POST");
//header("Access-Control-Allow-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


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
        
        var access = <?= $output ?>;
        
        this.parent.window.dataObj = access;
    </script>
</body>
</html>