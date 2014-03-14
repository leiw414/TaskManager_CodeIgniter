<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {
	
	function index(){
	
       if($this->session->userdata('login_state')) {
			//If the user has logged in... 
			$data = array();
		
			if($query = $this->task_model->get_records())
			{
				$data['records'] = $query;
			}
			
			//Display the user's existing tasks on the tasks page.
			$data['main_content'] = 'tasks';
			$this->load->view('includes/template',$data);
		}
		else{
			//If not logged in, direct to login page.
			$data['main_content'] = 'login';
			$this->load->view('includes/template',$data);
		}
		
	}
	
	function del_edit(){//Check if the user clicks the delete icon.
		
		
		$task_id = $this->input-> post('task_id');
		
		if($this->input->post('sbm') == "delete") { 
			
			$this->task_model->delete($task_id);	
			$this->index();
		} 
		
		else {
		
			$this->index();
		}
	}
	
	function edit($task_id){//When user clicks edit button...
	
		if($query = $this->task_model->get_record($task_id)){
				
				$data['record'] = $query;
		}
			
		//Display the task on the edittask page.
		$data['main_content'] = 'edittask';
		$this->load->view('includes/template',$data);
	
	}
	
	function newtask(){//When user clicks add new task button...
	
		$data['new'] = True;
		$data['main_content'] = 'edittask';
		$this->load->view('includes/template',$data);
	
	}
	
	function update(){//Update specific task.
	
		$task_id = $this->input-> post('task_id');

		$this->task_model->update_record($task_id);
			
	}
	
	function add(){//Add new task into database.

		$this->task_model->add_record();
	
	}
}

/* End of file task.php */
/* Location: ./application/controllers/task.php */