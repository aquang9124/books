<?php
class Book extends CI_Model {
	public function add_book($details) {
		$query = "INSERT INTO books (title, author, created_at, updated_at)
				  VALUES (?,?,?,?)";
		$values = array($details['title'], $details['author'], date('Y-m-d, H:i:s'), date('Y-m-d, H:i:s'));
		return $this->db->query($query, $values);
	}

	public function get_by_title($details) {
		$query = "SELECT * FROM books WHERE title = ?";
		$values = array($details['title']);
		return $this->db->query($query, $values)->row_array();
	}

	public function get_by_id($id) {
		$query = "SELECT * FROM books WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function get_title_by_id($id) {
		$query = "SELECT books.title, books.id as book_id, users.id as user_id FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  JOIN books ON reviews.book_id = books.id
				  WHERE user_id = ?
				  GROUP BY book_id";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	public function get_books() {
		$query = "SELECT books.title, books.id as book_id, users.id as user_id
				  FROM users
				  JOIN reviews ON users.id = reviews.user_id
				  JOIN books ON reviews.book_id = books.id
				  GROUP BY book_id";
		return $this->db->query($query)->result_array();
	}

}





?>