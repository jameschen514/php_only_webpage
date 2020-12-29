/**
 * Description of main.js
 *
 * @author jchen
 */


$(document).ready(function(){
    var result = $.ajax({
        accepts: {
        'json': 'application/json'},
        'url' : 'weather_station.php',
        'contentType': 'application/json',
        'dataType': 'json',
        'method': 'GET'
    });
    
    console.log(result);
    
});