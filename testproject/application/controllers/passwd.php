<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Passwd extends CI_Controller {

	public function __construct(){
            parent::__construct();
            // Your own constructor code
			if(!$this->session->userdata('login_state')) {
				redirect('login');
			}
			
    }
	
	function update()
	{
		if($this->input->post('ajax')) {
			
			$old_password = sha1($this->input->post('old_password'));
			
			//Check if the old password matches.
			$query = $this->passwd_model->check_passwd($old_password);
				
			if($query) {//If yes, then update，return success message.
				
				$new_password = sha1($this->input->post('new_password'));
				$this->passwd_model->update($new_password);
				$data['success'] = 'Your password has been updated!';
				$this->load->view('password_updated', $data);		
			} 
			else {
				//Otherwise, return error message.
				$data['not_match'] = 'Your email and password do not match!';
				$this->load->view('password_updated', $data);	
			}
		}
	
	}
}
/* End of file passwd.php */
/* Location: ./application/controllers/passwd.php */