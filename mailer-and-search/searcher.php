<?php

	header('Access-Control-Allow-Origin: *');

		$searchRegion = $_GET["searchRegion"];

		if ($searchRegion == null) {
			$searchRegion = 'Canterbury';
		}

		if ($_GET['form'] == 'volunteers') {
			$query = urlencode("QUERY-GOES-HERE");
		} elseif ($_GET['form'] == 'venues') {
			$query = urlencode("QUERY-GOES-HERE");
		}

		function jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
		    if($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
		       $jsonp = substr($jsonp, strpos($jsonp, '('));
		    }
		    return json_decode(trim($jsonp,'();'), $assoc);
		}

		if ($_GET['form'] == 'volunteers') {
			$json = file_get_contents('https://docs.google.com/spreadsheets/d/SHEET-TOKEN-GOES-HERE/gviz/tq?tq='.$query.'&tqx=responseHandler:a');
		} elseif ($_GET['form'] == 'venues') {
			$json = file_get_contents('https://docs.google.com/spreadsheets/d/SHEET-TOKEN-GOES-HERE/gviz/tq?tq='.$query.'&tqx=responseHandler:a');
		}

		$array = jsonp_decode($json, true);

		header('Content-Type: application/json');
		echo json_encode($array);

?>