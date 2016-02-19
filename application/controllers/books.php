<?php
class Books extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Book');
		$this->load->model('Review');
	}
	public function add_book() {
		$this->load->view('add_book');
	}

	public function book_added() {
		
		$details = $this->session->userdata("details");
		$book_details = $this->Book->get_by_title($details);
		$title = $details['title'];
		$reviews = $this->Review->get_reviews_by_title($title);
		$this->load->view('book_detail', array("book_details" => $book_details, "reviews" => $reviews));

	}

	public function user_profile($id) {
		$book_details = $this->Book->get_title_by_id($id); // Gets me the book details for that user
		$reviews = $this->Review->get_reviews_by_id($id); // Gets me the review details for that user
		$rev_num = $this->Review->get_review_count($id); // Gets me the number of reviews for that user
		$this->load->view('user_detail', array("book_details" => $book_details, "reviews" => $reviews, "rev_num" => $rev_num));
	}

	public function book_profile($book_id, $user_id) {
		$book_details = $this->Book->get_by_id($book_id); // Gets me the book details for that user
		$reviews = $this->Review->get_all_by_id($user_id, $book_id); // Gets me the review details for that user
		$this->load->view('book_detail', array("book_details" => $book_details, "reviews" => $reviews));
	}

	public function home() {
		$user_id = $this->session->userdata('user_id');
		$reviews = $this->Review->retrieve_with_id($user_id);
		$books = $this->Book->get_books();
		$this->load->view('profile', array("books" => $books, "reviews" => $reviews));
	}

	public function new_book() {
		$poster_id = $this->input->post('review_btn');
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique[books.title]');
		$this->form_validation->set_rules('review', 'Review', 'trim|required');


		if (empty($this->input->post('author')))
		{
			$details = array(
				"title" => $this->input->post('title'),
				"author" => $this->input->post('author1')
			);
		}
	
		else
		{
			$details = array(
				"title" => $this->input->post('title'),
				"author" => $this->input->post('author')
			);
		}

		if ($this->form_validation->run())
		{
			$this->Book->add_book($details);
			$book_details = $this->Book->get_by_title($details);
			$review_info = array(
				"review" => $this->input->post('review'),
				"rating" => $this->input->post('stars'),
				"user_id" => $poster_id,
				"book_id" => $book_details['id']
			);
			$this->Review->add_review($review_info);
			$this->session->set_userdata("details", $details);
			redirect('book_added');
		}

		else if ($this->Book->get_by_title($details) !== null)
		{
			$book_details = $this->Book->get_by_title($details);
			$review_info = array(
				"review" => $this->input->post('review'),
				"rating" => $this->input->post('stars'),
				"user_id" => $poster_id,
				"book_id" => $book_details['id']
			);
			$this->Review->add_review($review_info);
			$this->session->set_userdata("details", $details);
			redirect('book_added');
		}
		
		else
		{
			$this->session->set_flashdata("add_errors", "<p class='errors'>Unable to process info</p>");
			redirect('add_book');
		}
	}

	public function new_review() {
		$this->form_validation->set_rules('review', 'Review', 'trim|required');
		if ($this->form_validation->run())
		{
			$book_id = $this->input->post('book_id');
			$poster_id = $this->input->post('profile_r_btn');
			$book_details = $this->Book->get_by_id($book_id);
			$review_info = array(
				"review" => $this->input->post('review'),
				"rating" => $this->input->post('stars'),
				"user_id" => $poster_id,
				"book_id" => $book_details['id']
			);
			$this->Review->add_review($review_info);
			$this->session->set_userdata("details", $book_details);
			redirect('book_added');
		}
		else
		{
			$this->session->set_flashdata("add_errors", "<p class='errors'>Unable to process info</p>");
			redirect('book_added');
		}
	}

	public function delete_review($review_id) {
		$this->Review->delete_by_id($review_id);
		redirect('book_added');
	}

}





?>