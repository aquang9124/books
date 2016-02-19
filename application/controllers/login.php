<?php
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Log');
	}
	public function index() {
		$this->load->view('main');
	}

	public function logmein() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$user = $this->Log->get_user_by_email($email);

		if ($user && $user['password'] == $password)
		{
			$user_info = array(
				"user_id" => $user['id'],
				"user_email" => $user['email'],
				"user_last_name" => $user['last_name'],
				"user_first_name" => $user['first_name'],
				"logged_in" => true
			);
			$this->session->set_userdata($user_info);
			redirect("home");
		}
		else
		{
			$this->session->set_flashdata("login_error", "<p class='error'>Invalid email or password</p>");
			redirect("/");
		}
	}

	public function register() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|min_length[8]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirm', 'trim|required');

		if ($this->form_validation->run() === true)
		{
			$details = array(
				"first_name" => "{$this->input->post('first_name')}",
				"last_name" => "{$this->input->post('last_name')}",
				"email" => "{$this->input->post('email')}",
				"password" => "{$this->input->post('password')}",
				"alias" => "{$this->input->post('alias')}"
			);
			$this->Log->add_user($details);
			redirect('/');
		}
		else
		{
			$this->session->set_flashdata("register_error", "<p class='error'>Invalid submissions</p>");
			redirect('/');
		}
	}

	public function profile() {
		if ($this->session->userdata('logged_in') === true)
		{
			$this->load->view('profile');
		}
		else
		{
			redirect("/");
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('/');
	}
}






?>