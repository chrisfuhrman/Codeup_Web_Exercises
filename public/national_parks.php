<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once '../db_connect.php';




$countStmt = $dbc->query('SELECT count(*) FROM national_parks');
$parkNum = $countStmt->fetchColumn();

$parks = $dbc->query('SELECT * FROM national_parks');
$parks = $parks->fetchAll(PDO::FETCH_ASSOC);
// print_r($parks);

// foreach ($parks as $park) {
// 	foreach ($park as $key) {
// 		echo $key;
// 	}
// }

$query = "SELECT * FROM national_parks";
$stmt = $dbc->query($query);
// print_r($stmt);

// $results = $stmt->($query);




/* $_GET */

// while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
// 	print_r($row);
// }

?>


<!DOCTYPE html>
<html>
<head>
	<title>National Park List</title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->

<style>
	th, table {
		text-align: center;
	}
	th {
		background-color: #3FBCFF;
		color: #fff;
	}

	.my-btn {
	background-color: #3FBCFF;
	color: #fff;
	border-radius: 10px;
	padding-left: 15px;
	padding-right: 15px;
	}

	#footer {
		margin-top: 40px;
		background-color: gray;
		color: #fff;
	}
	.center-text {
		text-align: center;
	}
</style>

</head>
<body>

	<div class="container">
		<h1 class="center-text">National Park List</h1>
	
	<!-- HTML & PHP to output National park list from DB -->
		<table class="table table-striped table-bordered">
			<tr id="tr-one">
				<th>Name</th>
				<th>Location</th>
				<th>Date Established</th>
				<th>Acres</th>
			</tr>
	<? while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
		   
		<tr><td> <?= $row['name']; ?> </td>	
		<td> <?= $row['location']; ?> </td>
		<td> <?= $row['date_established']; ?> </td>
		<td> <?= $row['area_in_acres']; ?> </td> </tr>

	<? endwhile; ?> </table>

<div id="button-group">
	<button type="button" class="btn btn-primary my-btn bck-btn pull-left"> &#8592; Previous </button>
	<button type="button" class="btn btn-primary my-btn pull-right">Next &#8594; </button>
</div>
		
	</div>


<!-- Footer -->
		<section id="footer" class="center-text">
			<div class="container">
				<div class="row">
					<h5>National Park List</h5>
					<h6>&copy; Chris Fuhrman</h6>
				</div>
			</div>
		</section>

</body>
</html>

