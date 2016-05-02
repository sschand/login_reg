<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');		
	}	
	public function register($post){
		$this->session->set_userdata('email', $post['email']); // to load this specific user in the logged in page
		$this->session->set_userdata('is_logged_in', true);

		$date = date('Y-m-d H:i:s');	
		$query = "INSERT INTO login_reg.users (first_name, last_name, email, password, created_at, updated_at) VALUES(?,?,?,?,?,?)";
		$values = array($post['first_name'],$post['last_name'],$post['email'],md5($post['password']),$date,$date);

		return $this->db->query($query, $values);
	}
	public function get_user_by_email($email){
		$query = "SELECT * FROM login_reg.users WHERE email = ?;";
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
	}
	public function get_user_by_email_password($email,$pass){
		$password = md5($pass);
		$query = "SELECT * FROM login_reg.users WHERE email=? AND password=?;";
		$values = array($email,$password);
		return $this->db->query($query, $values)->row_array();
	}
}

//end of login model