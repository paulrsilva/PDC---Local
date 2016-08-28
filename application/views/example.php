<?php

 /**
    $feed = file_get_contents("http://weather.yahooapis.com/forecastrss?w=2295424&u=c");
    $xml = new SimpleXmlElement($feed);
    foreach($xml->channel->item as $entry1)
    {
        $yweather1 = $entry1->children("http://xml.weather.yahoo.com/ns/rss/1.0");
        $tag1 = $yweather1->condition;
        foreach($tag1->attributes() as $a => $b)
       {
            if($a == 'text')
            {
                $weather_climate = $b;
            }
            if($a == 'temp')
            {
                    $weather_temperature = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$b."&deg;";
            }
       }
    }
    $image_name =explode("<img src=",$xml->channel->item->description);
    $w_image = explode("/>",$image_name[1]);
    $weather_image = $w_image[0];
    echo 'Weather image: <img src='.$weather_image.'>';
    echo "<br><br><br>";
    echo $weather_climate;
    echo $weather_temperature.'C';
  * 
  */

    
    
    echo 'amo vc. A única pessoa que queria estar aqui agora está meio chateada comigo e com o Gabriel no colo.';
?>
