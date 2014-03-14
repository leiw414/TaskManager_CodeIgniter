
	<div class="container">
    	<div class="row" >
			<div class="col-md-2" ></div>
			<div class="col-md-8" >			
				<div class="panel panel-primary">
					<div class="panel-heading">
							<span class="clickable filter panel-title" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								Tasks<i class="glyphicon glyphicon-filter"></i>	
							</span>
							<a href="" onclick="popupwindow('index.php?/task/newtask','Add new',600,500)" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
					</div>
					<!-- toggle-->
					<div class="panel-body">
						<input type="text" class="form-control" id="task-table-filter" data-action="filter" data-filters="#task-table" placeholder="Filter Tasks" />
					</div>
					<form class="form-horizontal" action='<?php echo base_url();?>index.php?/task/del_edit' method="POST">
					<div class="table-responsive">
					<table class="table table-hover" id="task-table">
						<thead>
							<tr>
								<th>#</th>
								<th>Task</th>
								<th>Assignee</th>
								<th>Status</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>				
						<tbody>
						<?php if(isset($records)) :  ?>
						<?php $n=1; ?>
						<?php foreach($records as $row) : ?>
							<div class="hidden">
									<label >Task ID</label>
									<input type="text" name="task_id" value="<?php echo $row->TASK_ID ;?>">
							</div>
							<tr>
								<td><?php echo $n++; ?></td>
								<td><?php echo $row->TASK_NAME; ?></td>
								<td><?php echo $row->ASSIGNEE; ?></td>
								<td><?php echo $row->STATUS; ?></td>
								<td><button class='btn btn-info btn-xs' name= "sbm" value="edit"  onclick="popupwindow('index.php?/task/edit/<?php echo $row->TASK_ID ;?>','Add new',600,500)" ><span class="glyphicon glyphicon-edit"></span> Edit</button> </td>
								<td><button class="btn btn-danger btn-xs" name= "sbm" value="delete" onclick="return confirm('Are you sure you want to delete it?')" ><span class="glyphicon glyphicon-remove"></span> Del</button></td>
							</tr>
						<?php endforeach; ?>
						<?php endif; ?>
						</tbody>
					</table>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
	

     