<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Book Details</title>
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
	.inline-quote {
		display: inline-block;
		width: 80%;
	}
	.date-created {
		font-style: italic;
	}
	.the-hr {
		background-color: black; /*This is for firefox and opera*/
		border-color: black; 
	}
	.book-title, .reviews {
		margin-top: 0;
	}
	.my-h5 {
		display: inline-block;
		width: 10%;
	}
	.author {
		margin-bottom: 0;
	}
	
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<a class="top-links2" href="/logout"><button class="btn btn-info">Log Out</button></a>
				<a class="top-links1" href="/home"><button class="btn btn-info">Home</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h1 class="book-title"><?= $book_details['title'] ?></h1>
				<h2 class="author">Author: <?= $book_details['author'] ?></h2>
			</div>
			<div class="col-xs-6">
				<h1 class="reviews">Reviews:</h1>
<?php       if ($reviews) {
				foreach ($reviews as $review) { ?>
				<hr class="the-hr">
				<p>Rating: <?= $review['rating'] ?> star(s)</p>
				<a href="/user_profile/<?= $review['user_id'] ?>"><?= $review['first_name'] ?></a>
				<p class="inline-quote">says: <?= $review['review'] ?></p>
				<p class="date-created">Posted on <?= $review['posted'] ?></p>
<?php       		if ($review['user_id'] === $this->session->userdata('user_id')) { ?>
						<a href="/delete/<?= $review['review_id'] ?>"><button class='btn btn-default'>Delete</button></a>
<?php               } ?>
<?php           } ?>
<?php       } ?>
			</div>
			<div class="col-xs-6">
				<form action="add_review" method="post" role="form">
					<div class="form-group">
						<label for="my_review">Add a Review:</label>
						<textarea name="review" id="my-review" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="my-stars">Rating: </label>
						<select id="my-stars" name="stars">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						<h5 class="my-h5">star(s).</h5>
					</div>
					<input type="hidden" name="book_id" value="<?= $review['book_id'] ?>">
					<button type="submit" name="profile_r_btn" class="btn btn-success" value="<?= $this->session->userdata('user_id') ?>">Submit Review</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>