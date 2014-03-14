

<div class="container">    
		<div id="loginbox " class="margin-nav mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">      

			<div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Forgot Password</div>
   						<p class="list-group-item-text">Submit your email address and we'll send you a link to reset your password.</p>
                    </div>     
					<div class="panel-body" >
						<?php echo validation_errors('<p class="error alert alert-danger col-sm-12"> *'); ?>
						<?php if (isset($error)): ?>
							<div id="login-alert" class="alert alert-danger col-sm-12">
								<a class="close" data-dismiss="alert" href="#">×</a>This Email address havs not been registered!
							</div>
						<?php endif; ?>
						<form class="form-horizontal" action="<?php echo base_url();?>index.php?/login/sendpw" method="post">
							 <div class="input-group input-dis">
								<label class="control-label"  for="email"> Your e-mail address:</label>
								<input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
							 </div>
							<div class="input-group input-dis">
								<button class="btn btn-primary">Send Reset Email</button>
							</div>		
						</form>
					</div>
			</div>
		</div>
</div> 