<?php

class Task_model extends CI_Model {
	
	function get_records()
	{
		//Get all tasks saved in the database by user id.
		$user_id = $this->session->userdata('id');
		$this->db->from('tasks');
		$this->db->where( 'USER_ID', $user_id);
		$q = $this->db->get();
		
		return $q->result();
	}
	
	function get_record($task_id)
	{
		//Get specific task by task id and user id.
		$user_id = $this->session->userdata('id');
		$this->db->from('tasks');
		$this->db->where( 'USER_ID', $user_id);
		$this->db->where( 'TASK_ID', $task_id);
		$q = $this->db->get();
		
		return $q->result();
	}
	
	function update_record($task_id, $data) 
	{
		//Update specific task by task id and user id.			
		$user_id = $this->session->userdata('id');
		$this->db->where( 'USER_ID', $user_id);
		$this->db->where( 'TASK_ID', $task_id);
		$this->db->update('tasks', $data);
	}
	
	function add_record($data) 
	{
		//Add task into database.		
		$user_id = $this->session->userdata('id');
		$this->db->where( 'USER_ID', $user_id);
		$this->db->insert('tasks', $data);
		return;
	}
	
	function delete($task_id)
	{
		//Delete specific task by task id.
		$this->db->where( 'TASK_ID', $task_id);				
		$this->db->delete('tasks');
	}
}