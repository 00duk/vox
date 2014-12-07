<?php

$url = "http://gdata.youtube.com/feeds/api/users/v0xpopulirecords";


/*$fp = fopen($url, 'r');
$str = stream_get_contents($fp);


var_dump($str);

fclose($fp);*/


$sc_content = file_get_contents("http://api.soundcloud.com/users/voxpopuli-records?consumer_key=726de19451503113d25d881bec2d2d67");
$sc_xml = simplexml_load_string($sc_content);

echo $sc_xml -> {'followers-count'};