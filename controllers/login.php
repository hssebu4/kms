<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
	//call CodeIgniter's default Constructor
	parent::__construct();
	
	//load database libray manually
	$this->load->database();
	$this->load->model('Session');
	 //Load session library 
	 $this->load->library('session');


	 
	}

	public function index()
	{  
		 //The view data to be used
		$data['login_tab_title'] = "Nice | KMS";
		$data['login_form_title'] = "Sign in to start your session";
		$this->load->helper('url');
		$this->session->set_userdata('kms_access_status',0);
		$this->session->sess_destroy();
		$this->load->view('login',$data);
		
		
	}

	//The login function
	public function login_funcn()
	{
		//The view data to be used
		$data['login_tab_title'] = "Nice | KMS";
		$data['login_form_title'] = "Sign in to start your session";

		$login_email = $this->input->post('login_form_email');
		$login_key   = $this->input->post('login_form_key');
		
		//Obtain the current employee in the dataset
		$Fetch_Login_Result = $this->Session->Login($login_email,$login_key);

		$session_username = $this->session->userdata('kms_access_username');
		$session_user_dept_id =  $this->session->userdata('kms_access_user_dept_id');//kms_emp_department
		$session_user_access_status = $this->session->userdata('kms_access_role_status');

		if($Fetch_Login_Result == 3)
		{
			$this->load->helper('url'); 
			$this->session->set_flashdata('Message_login', "Your account does not exist...");
			redirect('/');
			
		}
		else if($Fetch_Login_Result == 2)
		{
			$this->load->helper('url'); 
			$this->session->set_flashdata('Message_login', "Your password is invalid");
			$this->session->set_flashdata('Input_style', "autofocus style=\"border: 1px solid red;\"");
			redirect('/');
		}else if($session_user_dept_id == 3 || $session_user_dept_id == 2 || $session_user_dept_id == 9|| $Fetch_Login_Result == 1 || $session_user_dept_id == 7 || $session_user_dept_id == 2 || $session_user_dept_id == 8 || $session_user_dept_id == 5 || $session_user_dept_id == 6)
		{
			$this->load->helper('url');
			redirect('Forum/');
			
		}
		else{
			echo $session_user_dept_id." /".$Fetch_Login_Result;
		}




	}

	//The login function
	public function logOut()
	{   
		$this->load->helper('url'); 
		$this->session->set_userdata('kms_access_status',0);
		$this->session->sess_destroy();
        redirect('/');
	}
 
	public function Reset()
	{
		$this->load->library('email');
		
		//The we receive the user inout as below
		$kms_reset_key_phone = $this->input->post("kms_login_password_reset");
		$kms_reset_username  = $this->input->post('Kms_input_hidden_username');

        //Validate the user inputs as below
		$Kms_validate_input  = $this->Session->Validate_request($kms_reset_key_phone,$kms_reset_username);
		//echo "Connected ".$kms_reset_key_phone." the username ".$kms_reset_username;
		if($Kms_validate_input != '000')
		{
			$this->email->from('kms@nice.co.ug', 'Identification');
			$this->email->to('hssebunya@nice.co.ug');
			$this->email->message('The email send using codeigniter library');
			$Reset_Feedback = $this->email->send(FALSE);
			echo "resent ->".$this->email->print_debugger(array('headers'));
		}else{}



	}
	

}
