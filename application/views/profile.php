<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Books Home</title>
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
	.header {
		width: 50%;
		display: inline-block;
		margin-top: 10px;
	}
	.top-link1, .top-link2 {
		text-align: right;
		float: right;
		margin-top: 10px;
	}
	.top-link2 {
		margin-left: 10px;
	}
	.display-others {
		width: 300px;
		height: 150px;
		overflow-y: scroll;
		margin-left: 20%;
		
	}
	.mah-books {
		display: block;
		font-size: 1.5em;
	}
	.inline-p {
		display: inline-block;
		width: 80%;
	}
	.quote {
		font-style: italic;
	}

</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="header">Welcome, <?= $this->session->userdata('user_first_name') ?>!</h1>
				<a class="top-link2" href="/logout"><button class="btn btn-info">Log Out</button></a>
				<a class="top-link1" href="/add_book"><button class="btn btn-info">Add Book and Review</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<h1>Recent Book Reviews:</h1>
<?php       if ($reviews) { 
				foreach ($reviews as $review) { ?>
				<a class="mah-books" href="/book_profile/<?= $review['book_id'] ?>/<?= $review['user_id'] ?>"><h1><?= $review['title'] ?></h1></a>
				<p>Rating: <?= $review['rating'] ?> star(s)</p>
				<a href="/user_profile/<?= $review['user_id'] ?>"><?= $review['first_name'] ?></a>
				<p class="inline-p">says: <span class="quote"><?= $review['review'] ?></span></p>
				<p class="quote"><?= $review['posted'] ?></p>
<?php 			} ?>
<?php       } ?>
			</div>
			<div class="col-xs-6">
				<h1>Other Books with Reviews:</h1>
				<div class="display-others">
<?php       	if ($books) { ?>
<?php  				foreach($books as $book) { ?>
					<a class="mah-books" href="/book_profile/<?= $book['book_id'] ?>/<?= $book['user_id'] ?>"><?= $book['title'] ?></a>
<?php               } ?>
<?php           }  ?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>