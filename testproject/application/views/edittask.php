    <div class="container">    
        <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 margin-nav">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">Task</div>
                        </div>  
                        <div class="panel-body" >						
								<?php if (isset($record)): ?>
								<?php foreach($record as $row): ?> 
								<form id="editform" class="form-horizontal" role="form" action='<?php echo base_url();?>index.php?/task/update' method="POST">                         
								<div id="edit_result">
								</div>
								<div class="form-group hidden">
                                    <label for="task" class="col-md-3 control-label">Task ID</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="task_id" id="task_id" value="<?php echo $row->TASK_ID; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="task" class="col-md-3 control-label">Task</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="task" id="task"   value="<?php echo $row->TASK_NAME; ?>">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="Assignee" class="col-md-3 control-label">Assignee</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="assignee" id="assignee" value="<?php echo $row->ASSIGNEE; ?>" >
							        </div>
                                </div>
								
								<div class="form-group">
                                    <label for="status" class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="status" id="status" value="<?php echo $row->STATUS; ?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
   										<input type="submit" name="submit" id="esubmit" value="&nbsp Update" class="btn btn-primary"  id="submit" />
									</div>
                                </div>
								<?php endforeach;?>
								<?php endif; ?>
								</form>
								<?php if (isset($new)): ?>
								<form id="addform" class="form-horizontal" role="form" action='<?php echo base_url();?>index.php?/task/add' method="POST">                         
								<div id="edit_result">
								</div>
                                <div class="form-group">
                                    <label for="task" class="col-md-3 control-label">Task</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="task" id="task"   value="">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="Assignee" class="col-md-3 control-label">Assignee</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="assignee" id="assignee" value="" >
							        </div>
                                </div>
								
								<div class="form-group">
                                    <label for="status" class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="status" id="status" value="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
   										<input type="submit" name="submit" id="esubmit" value="&nbsp Add" class="btn btn-primary"  id="submit" />
									</div>
                                </div>
								<?php endif; ?>
								</form>
                         </div>
                    </div>  
         </div> 
        
    </div>
<script type="text/javascript">
	window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
		window.close();
    }
</script>
<script type="text/javascript">

$('#esubmit').click(function() {
	
	var task = $('#task').val();
	var assignee = $('#assignee').val();
	var status = $('#status').val();
	
	if (!task ) {
		$("#edit_result").empty();
		$("#edit_result").append("<div id='signupalert'  class='alert alert-danger'><a class='close' data-dismiss='alert' href='#'>×</a>Please Enter Your Task Name!</div>");
		return false;

	}
	
	if (!assignee) {
		$("#edit_result").empty();
		$("#edit_result").append("<div id='signupalert'  class='alert alert-danger'><a class='close' data-dismiss='alert' href='#'>×</a>Please Enter Your Assignee!</div>");
		return false;
	}
	
	if (!status) {
	
		$("#edit_result").empty();
		$("#edit_result").append("<div id='signupalert'  class='alert alert-danger'><a class='close' data-dismiss='alert' href='#'>×</a>Please Enter the Status of Task!</div>");
		return false;
	}

});

</script>