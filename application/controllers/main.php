<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}
	public function index()
	{
		// see if the 'counter' exists in the session
		if ($this->session->userdata('counter'))
		{
			$counter = $this->session->userdata('counter');
			$this->session->set_userdata('counter', $counter+1);
		}
		else
		{
			$this->session->set_userdata('counter', 1);
		}
		$this->load->view('index', array("counter" => $this->session->userdata("counter")));
	}
	public function hello()
	{
		echo "Came here";
	}
	public function reset()
	{
		$this->session->set_userdata('counter', 0);
		redirect('/');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */