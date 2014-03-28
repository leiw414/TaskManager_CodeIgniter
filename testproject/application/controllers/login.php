<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	var $email_from="leiw414@gmail.com";	
	
	function index(){
		//If user has logged in, redirect to task controller.
		if($this->session->userdata('login_state')) {
            redirect('task');
        } 
		//Otherwise, direct to login page.
		else {
			$data['main_content'] = 'login';
			$this->load->view('includes/template',$data);
		}
	}
	
	function validate_credentials(){		
		
		$this->load->library('form_validation');
		
		//Field name, error message, validation rules.
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|xss_clean');
	
		
		if($this->form_validation->run() == FALSE)
		{
			$this->index();//Direct to signup page with error message.
		}
		
		else{
		
			$user_id = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			//Check if the account exists...
			if($this->membership_model->email_exists($user_id) ==  False)
			{
				//If not, return error message, direct to login page.
				$data['not_exist'] = 'The account does not exist!';
				$data['login_state'] = False;
				$data['main_content'] = 'login';
				$this->load->view('includes/template',$data);
			
			}
			//Check if the account has been activated.
			else if($this->membership_model->check_activation($user_id)==False) 
			{
				//If not, return error message, direct to login page.
				$data['activation'] = 'The account has not been activated';
				$data['login_state'] = False;
				$data['main_content'] = 'login';
				$this->load->view('includes/template',$data);
			}
			//If activated & exists...
			else{
			
				$query = $this->membership_model->validate($user_id, $password);
				if($query) //If the user's credentials validated... redirect to task controller.
				{
					
					$this->session->set_userdata('login_state', TRUE);
					$this->session->set_userdata('id', $this->input->post('email'));				
					redirect('task');
				}
				
				else //If incorrect username or password, return error message, direct to login page.
				{
					$data['incorrect'] = 'incorrect Username or Password';
					$data['login_state'] = False;
					$data['main_content'] = 'login';
					$this->load->view('includes/template',$data);
				}
			}
		}
	}
	
	function signup()//Display the signup page.
	{
		$data['main_content'] = 'signup';
		$this->load->view('includes/template', $data);
	}
	
	function create_member()//Create account. 
	{
		
		$this->load->library('form_validation');
		
		//Field name, error message, validation rules.
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]|xss_clean');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
	
		
		if($this->form_validation->run() == FALSE)
		{
			$this->signup();//Direct to signup page with error message.
		}
		
		else
		{			
			$user_id = $this->input->post('email');
			$passwd = sha1($this->input->post('password'));
			
			//Check if the email exists. If not...
			if($this->membership_model->email_exists($user_id) == False)
			{
				//get new member data from post input
				$new_member_insert_data = array(
					'USER_ID' => $this->input->post('email'),
					'PASSWORD' => sha1($this->input->post('password')),
					'REGISTRATION_DATE' => date("m/d/Y", mktime()),
					'STATUS'=> sha1($this->input->post('email'))
				);
				
				//Send an account activation email to user.
				if($query = $this->membership_model->create_member($new_member_insert_data))
				{
					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' =>'smtpout.secureserver.net',
						'smtp_port' => '80',
						'smtp_user' => 'info@generalbiosystems.com',
						'smtp_pass' => 'info#775',

						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);
					$verification_code = sha1($_POST["email"]); //Generate verification code.
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					
					$this->email->from($this->email_from, 'Test Project');
					$this->email->to($_POST["email"]);
					$this->email->subject("Activate Your Account");
					$link = 'You can simply activate your account by clicking the following link : <a href=" ' . base_url() .'index.php?/login/user_activation/'.$verification_code.'"> '. base_url() .'index.php?/login/user_activation/'.$verification_code.'</a>';
					$this->email->message($link);

					
					if($this->email->send())
					{
						//Direct to "Thank you, the activation email has sent to your email address..."
						$data['activate'] = 'activate email';
						$data['main_content'] = 'tkpage';
						$this->load->view('includes/template',$data);
					}
					else
					{
						show_error($this->email->print_debugger());
					}
				}
				else
				{
					
					$this->signup();			
				}
			}
			
			//If the email has already been registered... return error message and direct to signup page.
			else
			{
			
				$data['error'] = 'Email address already exists';
				$data['main_content'] = 'signup';
				$this->load->view('includes/template', $data);
			}
		}
		
	}
	
	function logout()  //Log out destroy session.
	{
		$this->session->sess_destroy();
		$this->index();
	}
	
    function pwforgot()//If user forgot password...
 	{
    	$data['main_content'] = 'pwlost';
		$this->load->view('includes/template',$data);
    }
	
	function sendpw()//Send an email to reset the password.
	{
		
		$this->load->library('form_validation');
		
		//Field name, error message, validation rules.
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			//Direct to pwlost page with error message.
			$data['main_content'] = 'pwlost';
			$this->load->view('includes/template',$data);
		}
		
		//If the account has not been registered.
		elseif($this->membership_model->email_exists() == False){
			
			$data['error'] = 'Email address has not been registered';
			$data['main_content'] = 'pwlost';
			$this->load->view('includes/template',$data);
		}
		else//Send reset password and save verification code and random code in the database.
		{
			$user_id = $this->input->post('email');
			$verification_code = sha1($this->input->post('email'));
			$status = sha1($this->generateRandomString(10));
			
			$data = array(
					'PASSWORD' => $verification_code,
					'STATUS'  => $status
			);
			//Replace password and status with verification and random code.
			$this->passwd_model->reset_passwd($user_id, $data);
			
			//Then send the email.
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' =>'smtpout.secureserver.net',
				'smtp_port' => '80',
				'smtp_user' => 'info@generalbiosystems.com',
				'smtp_pass' => 'info#775',

				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
					
			$this->email->from($this->email_from, 'Test Project');
			$this->email->to($_POST["email"]);
			$this->email->subject("Reset Your Password");
			$link = 'You can simply reset your password by clicking the following link :<br/> <a href=" ' . base_url() .'index.php?/login/resetpage/'.$verification_code.'/'.$status.'"> '. base_url() .'index.php?/login/resetpage/'.$verification_code.'/'.$status.'</a>';
			$this->email->message($link);
            
			//If email sent, direct to password sent page.
            if($this->email->send())
            {
            	$data['main_content'] = 'passsent';
				$this->load->view('includes/template',$data);
            }
            else
            {
            	show_error($this->email->print_debugger());
            }
		}
	}
	
	function generateRandomString($length = 10) { //Generate random string.
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	//When user click the reset link, display the 'resetpage'.
	function resetpage($passwd,$status){
		
		//Pass $passwd,$status to resetpage.
		$data['status'] = $status;
		$data['passwd'] = $passwd;
		$data['main_content'] = 'resetpage';
		$this->load->view('includes/template',$data);
	}
	
	//Get the $passwd,$status to find which account needs to reset password. 
	function resetpw($passwd,$status){
		
		$this->load->library('form_validation');
		
		//Field name, error message, validation rules.
		$this->form_validation->set_rules('new_passwd', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('new_passwd2', 'Password Confirmation', 'trim|required|matches[new_passwd]');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['status'] = $status;
			$data['passwd'] = $passwd;
			$data['main_content'] = 'resetpage';
			$this->load->view('includes/template',$data);
		}
		
		else
		{	
			//Reset password and set status as activated, direct to "Your Password has been reset!"
			$data = array(
					'PASSWORD' => sha1($this->input->post('new_passwd')),
					'STATUS' => 'activated'
			);
			$this->passwd_model->change_passwd($passwd,$status,$data);
			$data['reset'] = 'password reset';
			$data['main_content'] = 'tkpage';
			$this->load->view('includes/template',$data);
			
		}
	
	}
	
	function user_activation($sha1_email){
		
		if($this->membership_model->check_account_activation($sha1_email)){//Check if the status of account is $sha1_email.
		
			//Get activate account.
			$data['email'] = $this->membership_model->get_active_account($sha1_email);
			
			$data['main_content'] = 'account_activation';
			$this->load->view('includes/template',$data);
		}
		else{
			
			echo "Incorrect request";
		}		
	
	}
	
	function activate(){//Activate account by setting status as "activated" and direct to thank you register page.
		
		$this->session->set_userdata('id', $this->input->post('email'));
		
		//Set the status as "activated".		
		$this->membership_model->update_record();
		$data['register'] = 'thank you register';	
		$data['main_content'] = 'tkpage';
		$this->load->view('includes/template',$data);
		
	}
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */