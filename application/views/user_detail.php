<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Reviews</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.top-links1, .top-links2 {
		float: right;
		margin-top: 10px;
	}
	.top-links2 {
		margin-left: 10px;
	}
	.booka {
		margin-left: 10px;
	}
	.books {
		display: block;
		font-size: 1.4em;
		margin-left: 50px;
		margin-bottom: 10px;
	}
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<a class="top-links2" href="/logout"><button class="btn btn-info">Log Out</button></a>
				<a class="top-links1 booka" href="/add_book"><button class="btn btn-info">Add Book and Review</button></a>
				<a class="top-links1" href="/home"><button class="btn btn-info">Home</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<p>User Alias: <?= $reviews['alias'] ?></p>
				<p>Name: <?= $reviews['first_name'] . ' ' . $reviews['last_name'] ?></p>
				<p>Email: <?= $reviews['email'] ?></p>
				<p>Total Reviews: <?= $rev_num['rev_num'] ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1>Posted Reviews on the following books:</h1>
<?php       	if ($book_details) { 
					foreach ($book_details as $books) { ?>
					<a class="books" href="/book_profile/<?= $books['book_id'] ?>/<?= $books['user_id'] ?>"><?= $books['title'] ?></a>


<?php				}	?>
<?php           }   ?>
			</div>
		</div>
	</div>
</body>
</html>