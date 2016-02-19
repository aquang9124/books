<?php
class Review extends CI_Model {
	public function add_review($review_info) {
		$query = "INSERT INTO reviews (review, rating, user_id, book_id, created_at, updated_at)
				  VALUES (?,?,?,?,?,?)";
		$values = array($review_info['review'], $review_info['rating'], $review_info['user_id'], $review_info['book_id'], date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}

	public function get_reviews_by_title($title) {
		$query = "SELECT users.first_name, users.last_name, reviews.id as review_id, reviews.review, reviews.user_id, reviews.book_id, reviews.rating, reviews.created_at as posted
				  FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  JOIN books ON reviews.book_id = books.id
				  WHERE books.title = ?";
		$values = array($title);
		return $this->db->query($query, $values)->result_array();
	}

	public function get_all_by_id($user_id, $book_id) {
		$query = "SELECT users.first_name, users.last_name, books.title, reviews.id as review_id, reviews.review, reviews.user_id, reviews.book_id, reviews.rating, reviews.created_at as posted
				  FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  JOIN books ON reviews.book_id = books.id
				  WHERE users.id = ? AND books.id =?";
		$values = array($user_id, $book_id);
		return $this->db->query($query, $values)->result_array();
	}

	public function retrieve_with_id($user_id) {
		$query = "SELECT users.first_name, users.last_name, books.title, reviews.id as review_id, reviews.review, reviews.user_id, reviews.book_id, reviews.rating, reviews.created_at as posted
				  FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  JOIN books ON reviews.book_id = books.id
				  WHERE users.id = ?
				  LIMIT 3";
		$values = array($user_id);
		return $this->db->query($query, $values)->result_array();
	}

	public function delete_by_id($review_id) {
		$query = "DELETE FROM reviews WHERE id = ?";
		$values = array($review_id);
		return $this->db->query($query, $values);
	}

	public function get_reviews_by_id($id) {
		$query = "SELECT users.first_name, users.last_name, users.alias, users.email, books.title, reviews.user_id, reviews.book_id
				  FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  JOIN books ON reviews.book_id = books.id
				  WHERE users.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function get_review_count($id) {
		$query = "SELECT count(reviews.review) as rev_num
				  FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  WHERE users.id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}
}






?>