<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Passwd extends CI_Controller {

	function update()
	{
		if($this->input->post('ajax')) {
			
			//Check if the old password matches.
			$query = $this->passwd_model->check_passwd();
				
			if($query) {//If yes, then update，return success message.
				
				$this->passwd_model->update();
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