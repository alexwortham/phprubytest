<?php

$lines = file($argv[1]);

$ohSplit = array(array(), array());

foreach ($lines as $line) {
	$matches = array();
	preg_match('/^[\s]*#(0*)([\d]+)([a-zA-Z]*) ?- ?(.*)$/', $line, $matches);
	$oh = ($matches[1] === "") ? 1 : 0;
	array_push($ohSplit[$oh], array(
		"number" => $matches[2],
		"letter" => $matches[3],
		"name" => $matches[4],
		"line" => $line
	));
}

array_walk($ohSplit, function (&$array) { 
	uasort($array, function ($a, $b) {
		if (intval($a["number"]) === intval($b["number"])) {
			return strcmp($a["letter"], $b["letter"]);
		} else {
			return (intval($a["number"]) < intval($b["number"])) ? -1 : 1;
		}
	}); 

	foreach ($array as $line) {
		echo($line["line"]);
	}
});
