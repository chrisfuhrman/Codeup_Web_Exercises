<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once 'db_connect.php';

$parkArray =
[
	['name' => 'Acadia', 'location' => 'Maine', 'date_established' => 'February 26, 1919', 'area_in_acres' => '47389.67', 'description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.'],
	['name' => 'American Samoa', 'location' => 'American Samoa', 'date_established' => 'October 31, 1988', 'area_in_acres' => '9000.00', 'description' => 'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish.'],
	['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area_in_acres' => '801163.21', 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders.'],
	['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => 'September 12, 1964', 'area_in_acres' => '337597.83', 'description' => 'This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples'],
	['name' => 'Glacier Bay', 'location' => 'Alaska', 'date_established' => 'December 2, 1980', 'area_in_acres' => '3224,840.31','description' => 'Glacier Bay has numerous tidewater glaciers, mountains, fjords, and a temperate rainforest, and is home to large populations of grizzly bears, mountain goats, whales, seals, and eagles. When discovered in 1794 by George Vancouver, the entire bay was covered in ice, but the glaciers have since receded more than 65 miles (105 km).'],
	['name' => 'Katmai', 'location' => 'Alaska', 'date_established' => 'December 2, 1980','area_in_acres' => '3674529.68', 'description' => 'This park on the Alaska Peninsula protects the Valley of Ten Thousand Smokes, an ash flow formed by the 1912 eruption of Novarupta, as well as Mount Katmai. Over 2,000 grizzly bears come here each year to catch spawning salmon. Other wildlife includes caribou, wolves, moose, and wolverines.'],
	['name' => 'Redwood', 'location' => 'California', 'date_established' => 'October 2, 1968', 'area_in_acres' => '112512.05', 'description' => 'This park and the co-managed state parks protect almost half of all remaining Coastal Redwoods, the tallest trees on Earth. There are three large river systems in this very seismically active area, and 37 miles (60 km) of protected coastline reveal tide pools and seastacks. The prairie, estuary, coast, river, and forest ecosystems contain a huge variety of animal and plant species.'],
	['name' => 'Yosemite', 'location' => 'California', 'date_established' => 'October 1, 1890', 'area_in_acres' => '761266.19', 'description' => 'Among the earliest candidates for National Park status, Yosemite features towering granite cliffs, dramatic waterfalls, and old-growth forests at a unique intersection of geology and hydrology. Half Dome and El Capitan rise from the park\'s centerpiece, the glacier-carved Yosemite Valley, and from its vertical walls drop Yosemite Falls, North America\'s tallest waterfall. Three Giant Sequoia groves, along with a pristine wilderness in the heart of the Sierra Nevada, are home to an abundance of rare plant and animal species.'],
	['name' => 'Shenandoah', 'location' => 'Virginia', 'date_established' => 'May 22, 1926', 'area_in_acres' => '199045.23', 'description' => 'Shenandoah\'s Blue Ridge Mountains are covered by sprawling hardwood forests that teem with tens of thousands of animals. The Skyline Drive and Appalachian Trail run the entire length of this narrow park, along with more than 500 miles (800 km) of hiking trails passing scenic overlooks and cataracts of the Shenandoah River.'],
	['name' => 'Saguaro', 'location' => 'Arizona', 'date_established' => 'October 14, 1994', 'area_in_acres' => '91439.71', 'description' => 'Split into the separate Rincon Mountain and Tucson Mountain Districts, this park is evidence that the dry Sonoran Desert is still home to a great variety of life spanning six biotic communities. Beyond the namesake Giant Saguaro cacti, there are barrel cacti, chollas, and prickly pears, as well as Lesser Long-nosed bats, spotted owls, and javelinas.']
];

$stmt = $dbc->prepare(
	'INSERT INTO national_parks (name, location, date_established, area_in_acres, description)
	VALUES (:name, :location, STR_TO_DATE(:date_established, \'%M %e, %Y\'), :area_in_acres, :description)'
);

foreach ($parkArray as $row) {

	$stmt->bindValue(':name', $row['name'], PDO::PARAM_STR);
	$stmt->bindValue(':location', $row['location'], PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $row['date_established'], PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres', $row['area_in_acres'], PDO::PARAM_INT);
	$stmt->bindValue(':description', $row['description'], PDO::PARAM_INT);

	$stmt->execute();
}








