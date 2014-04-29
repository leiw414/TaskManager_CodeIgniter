<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {
	
	public function __construct(){
            parent::__construct();
            // Your own constructor code
			if(!$this->session->userdata('login_state')) {
				redirect('login');
			}
			
    }
	   
	function index(){
	
       if($this->session->userdata('login_state')) {
			//If the user has logged in... 
			$data = array();
			$user_id = $this->session->userdata('id');
			
			if($query = $this->task_model->get_records($user_id))
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
			
			$user_id = $this->session->userdata('id');
			$this->task_model->delete($user_id, $task_id);	
			$this->index();
		} 
		
		else {
		
			$this->index();
		}
	}
	
	function edit($task_id){//When user clicks edit button...
	
		$user_id = $this->session->userdata('id');
		if($query = $this->task_model->get_record($user_id, $task_id)){
				
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
		
		$data = array(
			'TASK_NAME' => $_POST["task"],
			'ASSIGNEE' => $_POST["assignee"],
			'STATUS' => $_POST["status"]
		);
		$user_id = $this->session->userdata('id');
		
		$this->task_model->update_record($user_id, $task_id, $data);
			
	}
	
	function add(){//Add new task into database.

		$data = array(
			'USER_ID' => $this->session->userdata('id'),
			'TASK_NAME' => $_POST["task"],
			'ASSIGNEE' => $_POST["assignee"],
			'STATUS' => $_POST["status"]
		);
		$user_id = $this->session->userdata('id');
		$this->task_model->add_record($user_id, $data);
	
	}
}

/* End of file task.php */
/* Location: ./application/controllers/task.php */