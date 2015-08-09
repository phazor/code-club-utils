<?php

$id = $_POST['SOME-ID'];
$query = urlencode("select F WHERE A = ".$id." limit 10");
$json = file_get_contents('https://docs.google.com/spreadsheets/d/SHEET-ID-GOES-HERE/gviz/tq?tq='.$query.'&tqx=responseHandler:a');
$json = substr($json, 64, -2);
$json = "{".$json;
$array = json_decode($json, true);

$email = $array['table']['rows']['0']['c']['0']['v'];

?>