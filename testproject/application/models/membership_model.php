<?php

class Membership_model extends CI_model {

	function validate()//Check if the user's credentials validate.
	{
		
		$this->db->where('USER_ID', $this->input->post('email'));
		$this->db->where('PASSWORD', sha1($this->input->post('password')));
		$this->db->where('STATUS', 'activated');
		$query = $this->db->get('user');
		
		if($query->num_rows == 1)
		{
			//Save the last login date to check the activeness of the user in the future.
			$data = array (
				
				'last_login' => date("m/d/Y", mktime())
			);
			
			$this->db->where('USER_ID', $this->input->post('email'));
			$this->db->update('user', $data);
			
			return true;
		}
	}
	
	function check_activation()
	{
		//Check if the account has been activated.
		$this->db->where('USER_ID', $this->input->post('email'));
		$this->db->where('STATUS', 'activated');
		$query = $this->db->get('user');
		
		if($query->num_rows == 1){//If activated, return True.
			
			return true;
		}
		else{//Otherwise, return False.
			
			return False;
		}
	}
	
	function email_exists()
	{
		//Check if the account exists.
		$this->db->where('USER_ID',$this->input->post('email'));
		$query = $this->db->get('user');
		if ($query->num_rows() > 0){//If exists, return True.
			
			return true;
		}
		else{//Otherwise, return False.
			
			return false;
		}
	}
	
	function create_member()//Create account.
	{
		//Get data from input and save registration date.
		$new_member_insert_data = array(
			'USER_ID' => $this->input->post('email'),
			'PASSWORD' => sha1($this->input->post('password')),
			'REGISTRATION_DATE' => date("m/d/Y", mktime()),
			'STATUS'=> sha1($this->input->post('email'))
		);
		
		$insert = $this->db->insert('user', $new_member_insert_data);
		return $insert;
	}

	function check_account_activation($sha1_email)
	{
		//Check if the account(sha1_email) needs to be activated.
		$this->db->from('user');
		$this->db->where( array('STATUS'=>$sha1_email));
		$query = $this->db->get();	
		
		if($query->num_rows == 1)
		{
			return true;
		}
	}
	
	function get_active_account($sha1_email){
		
		//Return which account needs to be activated.
		$this->db->from('user');
		$this->db->select('USER_ID');
		$this->db->where( array('STATUS'=>$sha1_email));
		$q = $this->db->get();
		
		if ($q->num_rows()>0){
			foreach ($q->result() as $row){
				$data = $row->USER_ID;
			}
			return $data;
		}
		
	}
	
	function update_record() 
	{
		$data = array(
				'STATUS' => "activated"
		);
		$user_id = $this->session->userdata('id');
		$this->db->where( array('USER_ID'=>$user_id));
		$this->db->update('user', $data);
	}
}