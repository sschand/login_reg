<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User'); //load the User model that will be used in other methods

	// 	$this->output->enable_profiler();
	
	}
	public function index()
	{
		$this->load->view('login_register');
	}
	public function register(){
		// Do validations here then either call the model to put information in db or redirect to main page with errors
		$this->form_validation->set_rules("first_name", "First Name", "required|trim");
		$this->form_validation->set_rules("last_name", "Last Name", "required|trim");
		$this->form_validation->set_rules("password", "Password", "required|matches[c_password]|min_length[8]");
		$this->form_validation->set_rules("c_password", "Confirm Password", "required");
		$this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email|is_unique[users.email]");
		if($this->form_validation->run() == FALSE){
			$this->load->view('login_register');
		}else{
			$this->User->register($this->input->post());
			redirect(base_url().'login/welcome');
		}
	}
	public function welcome(){
		// Grab user information based on the email that was submitted(email is unique so result will be a unique user), set the session user_id and load the welcome page with user's information

		if($this->session->userdata('is_logged_in')){
			$user_info = $this->User->get_user_by_email($this->session->userdata('email'));
			$this->session->set_userdata('user_id', $user_info['id']);
			$data = array('user_info' => $user_info);
			$this->load->view('welcome',$data);
		}else{
			$this->session->set_flashdata('error', "<p>Please log in first!</p>");
			redirect(base_url());
		}
		
	}
	public function logoff(){
		// destroy session and set logged in variable to false, then redirect to main page
		$this->session->sess_destroy();
		$this->session->set_userdata('is_logged_in', false);
		$this->session->unset_userdata('user_id');
		redirect(base_url());
	}
	public function log_in(){
		// email has to be in email format, required, and has to exist in db
		$this->form_validation->set_rules("log_email", "Email", "trim|required|valid_email|callback_username_check");
		$this->form_validation->set_rules("log_password", "Password", "required|min_length[8]|callback_pass_check");

		if($this->form_validation->run() == FALSE){
			$this->load->view('login_register');
		}else{
			$this->session->set_userdata('email', $this->input->post('log_email'));
			$this->session->set_userdata('is_logged_in', true);
			// Log user in
			redirect(base_url().'login/welcome');
		}
	}	
	//Check to see if user exists in db
	public function username_check($email)
	{
		$email_exist = $this->User->get_user_by_email($email);

		if (empty($email_exist))
		{
			$this->form_validation->set_message('username_check', 'This email has not been registered yet, please check your email');
			return FALSE;
		}
		else
		{						
			return TRUE;
		}
	}
	//Check to see if email and password are correctly entered
	public function pass_check($password){
		$user_exist = $this->User->get_user_by_email_password($this->input->post('log_email'),$password);

		if (empty($user_exist))
		{
			$this->form_validation->set_message('pass_check', 'The email/password combination is incorrect');
			return FALSE;
		}
		else
		{						
			return TRUE;
		}
	}
}

//end of login controller