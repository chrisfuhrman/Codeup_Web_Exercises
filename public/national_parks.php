<?php

define('DB_HOST', '127.0.0.1');

define('DB_NAME', 'national_parks_db');

define('DB_USER', 'parks_user');

define('DB_PASS', 'codeup');

require_once '../db_connect.php';


// Determines the number of parks in db
$countStmt = $dbc->query('SELECT count(*) FROM national_parks');
$parkNum = $countStmt->fetchColumn();
// Amount of parks to display per page
$limNum = 4;

// Determine page count
$pageCount = ceil($parkNum / $limNum);

if (!isset($_GET['page'])) {
	$offsetNum = 0;
	$page = 1; 

} else {
	$page = $_GET['page'];
	$offsetNum = ($page != 1) ? ($page - 1) * 4: 0;
}



$stmt = $dbc->prepare(
	'SELECT * FROM national_parks
	 LIMIT :limNum OFFSET :offsetNum'
);

$stmt->bindValue(':limNum', $limNum, PDO::PARAM_INT);
$stmt->bindValue(':offsetNum', $offsetNum, PDO::PARAM_INT);

$stmt->execute();

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

	.page-btn {
		background-color: green;
		color: #fff;
	}

	#footer {
		margin-top: 40px;
		background-color: gray;
		color: #fff;
	}
	.center-text {
		text-align: center;
	}

	#footer {
		position: absolute;
		bottom: 0;
		width: 100%;
	}

	#page-num-div {
		margin-top: 15px;		 
	}

	.clear-fix {
		clear: both;
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
			   
			<tr>
				<td> <?= $row['name']; ?> </td>	
				<td> <?= $row['location']; ?> </td>
				<td> <?= $row['date_established']; ?> </td>
				<td> <?= $row['area_in_acres']; ?> </td>
			</tr>

		<? endwhile; ?> </table>

		<div id="button-group">

			<? if ($page >= 2) : ?>
				<a class="btn btn-primary my-btn bck-btn pull-left" href="?page=<?= --$page; ?>"> &#8592; Previous</a>

				<? ++$page; ?>
			<? endif; ?>

			<? if ($page < $pageCount) : ?>
				<a class="btn btn-primary my-btn pull-right" href="?page=<?= ++$page; ?>">Next &#8594;</a>				  
			<? endif; ?>

		</div>


		<div class="clear-fix"></div>


		<div id="page-num-div">

			<? for ($i = 1; $i <= $pageCount; $i++) : ?>
				<? if ($i == $page) : ?>
				<? else : ?>
					<a class="btn btn-primary page-btn" href="?page=<?= $i; ?>"> <?= $i; ?> </a>				  
				<? endif ?> 
			<? endfor ?>

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

