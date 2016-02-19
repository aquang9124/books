<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Book and Review</title>
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
	.my-h5 {
		display: inline-block;
		width: 10%;
	}
	.errors {
		color: red;
	}
</style>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<a class="top-links2" href="/logout"><button class="btn btn-info">Logout</button></a>
				<a class="top-links1" href="/home"><button class="btn btn-info">Home</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8">
				<h1>Add a New Book Title and a Review:</h1>
				<?php
					if ($this->session->flashdata('add_errors'))
					{
						echo $this->session->flashdata('add_errors');
					}


				?>
				<form action="new_book" method="post" role="form">
					<div class="form-group">
						<label for="book-title">Book Title: </label>
						<input class="form-control" type="text" name="title" id="book-title">
					</div>
					<div class="form-group">
						<h4>Author:</h4>
						<label for="choose-author">Choose from the list:</label>
						<select id="choose-author" name="author1">
							<option value="Stephen King">Stephen King</option>
							<option value="Veronica Roth">Veronica Roth</option>
							<option value="J.K Rowling">J.K. Rowling</option>
							<option value="Stephen King">Stephen King</option>
						</select>
					</div>
					<div class="form-group">
						<label for="add-author">Or add a new author:</label>
						<input class="form-control" type="text" name="author" id="add-author">
					</div>
					<div class="form-group">
						<label for="my-review">Review: </label>
						<textarea class="form-control" id="my-review" name="review"></textarea>
					</div>
					<div class="form-group">
						<label for="my-stars">Rating: </label>
						<select id="my-stars" name="stars">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
						<h5 class="my-h5">star(s).</h5>
					</div>
					<button type="submit" name="review_btn" class="btn btn-success" value="<?= $this->session->userdata('user_id') ?>">Add Book and Review</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>