<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once 'db_connect.php';

$parkArray =
[
	['name' => 'Acadia', 'location' => 'Maine', 'date_established' => 'February 26, 1919', 'area_in_acres' => '47389.67'],
	['name' => 'American Samoa', 'location' => 'American Samoa', 'date_established' => 'October 31, 1988', 'area_in_acres' => '9000.00'],
	['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area_in_acres' => '801163.21'],
	['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => 'September 12, 1964', 'area_in_acres' => '337597.83'],
	['name' => 'Glacier Bay', 'location' => 'Alaska', 'date_established' => 'December 2, 1980', 'area_in_acres' => '3224,840.31'],
	['name' => 'Katmai', 'location' => 'Alaska', 'date_established' => 'December 2, 1980','area_in_acres' => '3674529.68'],
	['name' => 'Redwood', 'location' => 'California', 'date_established' => 'October 2, 1968', 'area_in_acres' => '112512.05'],
	['name' => 'Yosemite', 'location' => 'California', 'date_established' => 'October 1, 1890', 'area_in_acres' => '761266.19'],
	['name' => 'Shenandoah', 'location' => 'Virginia', 'date_established' => 'May 22, 1926', 'area_in_acres' => '199045.23'],
	['name' => 'Saguaro', 'location' => 'Arizona', 'date_established' => 'October 14, 1994', 'area_in_acres' => '91439.71']
];

foreach ($parkArray as $row) {
	$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres)
		VALUES (
			'{$row['name']}', 
			'{$row['location']}', 
			STR_TO_DATE('{$row['date_established']}', '%M %e, %Y'),
			 '{$row['area_in_acres']}'
			 )";

	$dbc->exec($query);
}

// echo $query . PHP_EOL;

$dbc->exec($query);