    <div class="container">    
        <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 margin-nav">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" action='<?php echo base_url();?>index.php?/login/create_member' method="POST">                         
                                
                                    <?php echo validation_errors('<p class="alert alert-danger">'); ?> </p>
                                   
                                
								<?php if (isset($error)): ?>
								<div id="signupalert"  class="alert alert-danger">
									<a class="close" data-dismiss="alert" href="#">×</a>Email Address already exists!
								</div>
								<?php endif; ?>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
							        </div>
                                </div>
								
								<div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Confirm</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
   										<input type="submit" name="submit" value="&nbsp Sign Up" class="btn btn-primary" id="submit" />
									</div>
                                </div>
								 <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div class="sign-account" >
                                            Already have an account! 
											<a id="signinlink" href="<?php echo base_url();?>index.php?/login" >
												Sign In
											</a>
                                        </div>
                                    </div>
                                </div>  
                            </form>
                         </div>
                    </div>  
         </div> 
        
    </div>
