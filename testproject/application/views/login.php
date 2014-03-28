    <div class="container">    
        <div id="loginbox" class=" margin-nav col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-primary" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
						<?php echo validation_errors('<p class="alert alert-danger">'); ?> </p>
                        <?php if (isset($incorrect)): ?>
							 <div id="login-alert" class="alert alert-danger col-sm-12">
							<a class="close" data-dismiss="alert" href="<?php echo base_url();?>index.php?/login">×</a>Incorrect Username or Password!
							</div>
						<?php endif; ?>
						<?php if (isset($activation)): ?>
							 <div id="login-alert" class="alert alert-danger col-sm-12">
							<a class="close" data-dismiss="alert" href="<?php echo base_url();?>index.php?/login">×</a>Account has not been activated!
							</div>
						<?php endif; ?>
						<?php if (isset($not_exist)): ?>
							 <div id="login-alert" class="alert alert-danger col-sm-12">
							<a class="close" data-dismiss="alert" href="<?php echo base_url();?>index.php?/login">×</a>The account does not exist!
							</div>
						<?php endif; ?>				   
                        <form id="loginform" class="form-horizontal" role="form" action='<?php echo base_url();?>index.php?/login/validate_credentials' method="POST">
                            							
                            <div  class="input-group input-dis">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                                    </div>
                                
                            <div  class="input-group input-dis">
                                        <span class="input-group-addon reveal"><i class="glyphicon glyphicon-eye-open"></i></span>
                                        <input id="login-password" type="password" class="form-control pwd" name="password" placeholder="password">
                                    </div>
                                    

                                <div class="form-group input-dis">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button id="btn-login" href="#" class="btn btn-primary">Login  </button>
									  <div class="fogot-pw"><a href="<?php echo base_url();?>index.php?/login/pwforgot">Forgot password?</a></div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div class="sign-account">
                                            Don't have an account! 
											<a href="<?php echo base_url();?>index.php?/login/signup">
                                            Sign Up Here
											</a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     
                        </div>                     
                    </div>  
        </div>
    </div>
