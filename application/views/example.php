<?php

/**
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select wind from weather.forecast where woeid in (select woeid from geo.places(1) where text="chicago, il")';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
     $phpObj =  json_decode($json);
    var_dump($phpObj);
 * 
 */

// 26798558 - Curitiba

    $feed = file_get_contents("http://weather.yahooapis.com/forecastrss?w=2442047&u=c");
    
    print($feed);
    
    echo 'adasdasd';
    
    
?>