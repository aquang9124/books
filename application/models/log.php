<?php
class Log extends CI_Model {
	public function get_user_by_email($email) {
		return $this->db->query("SELECT * FROM users where email = ?", array($email))->row_array();
	}

	public function add_user($details) {
		$query = "INSERT INTO users (first_name, last_name, email, alias, password, created_at) 
				  VALUES (?,?,?,?,?,?)";
		$values = array($details['first_name'], $details['last_name'], $details['email'], $details['alias'], $details['password'], date("Y-m-d, H:i:s"));
		return $this->db->query($query, $values);
	}


}




?>