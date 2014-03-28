<?php

class Passwd_model extends CI_Model {
	
	
	function check_passwd($old_password)
	{
		//Check if the old password and user id match the record in the database.
		$user_id = $this->session->userdata('id');
		$this->db->from('user');
		$this->db->where('USER_ID', $user_id);
		$this->db->where('PASSWORD', $old_password);
		$query = $this->db->get();
		
		//If yes, return True.
		if($query->num_rows == 1)
		{
			return true;
		}
	}
	
	function update($new_password) 
	{
		//Update the password by user id.
		$user_id = $this->session->userdata('id');
		$this->db->where( 'USER_ID', $user_id);
		$data = array(
			'PASSWORD' => $new_password
		);
		$this->db->update('user', $data);
	}
	

	function reset_passwd($user_id, $data) 
	{
		//Replace password and status with verification and random code.
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