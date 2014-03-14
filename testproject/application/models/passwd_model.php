<?php

class Passwd_model extends CI_Model {
	
	
	function check_passwd()
	{
		//Check if the old password and user id match the record in the database.
		$user_id = $this->session->userdata('id');
		$this->db->from('user');
		$this->db->where('USER_ID', $user_id);
		$this->db->where('PASSWORD', sha1($this->input->post('old_password')));
		$query = $this->db->get();
		
		//If yes, return True.
		if($query->num_rows == 1)
		{
			return true;
		}
	}
	
	function update() 
	{
		//Update the password by user id.
		$user_id = $this->session->userdata('id');
		$this->db->where( 'USER_ID', $user_id);
		$data = array(
			'PASSWORD' => sha1($this->input->post('new_password'))
		);
		$this->db->update('user', $data);
	}
	

	function reset_passwd($data) 
	{
		//Replace password and status with verification and random code.
		$user_id = $this->input->post('email');
		$this->db->where('USER_ID', $user_id);
		$this->db->update('user', $data);
	}
	
	function change_passwd($passwd,$status,$data) 
	{
		//Find which account needs to reset password.
		$this->db->from('user');
		$this->db->where('PASSWORD', $passwd);
		$this->db->where('STATUS', $status );
		//Update password and status with data.
		$this->db->update('user', $data);
	}
}