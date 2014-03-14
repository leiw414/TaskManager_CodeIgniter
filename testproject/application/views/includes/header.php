
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tasks Manager</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>index.php?/task">Task Manager</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<?php if( $this->session->userdata('login_state')):?>
				
				<li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Password<b class="caret"></b></a>
                     <ul class="dropdown-menu" style="padding: 15px; min-width: 250px;" >
                        <li>
                           <div class="dropdown-row">
                              <div class="col-md-13">
								<div class="form-group">
										<div id="message" > </div>
								</div>	
                                 <form class="form" role="form" method="post" action="<?php echo base_url();?>index.php?/password/update" accept-charset="UTF-8" id="login-nav">
									<div class="form-group">
                                       <label class="sr-only" for="old_password">Old Password</label>
                                       <input name="old_password" type="password" class="form-control" id="old_password" placeholder="Old Password" required>
                                    </div>
									<div class="form-group">
                                       <label class="sr-only" for="new_password">New Password</label>
                                       <input name="new_password" type="password" class="form-control" id="new_password" placeholder="New Password" required>
                                    </div>
									<div class="form-group">
                                       <label class="sr-only" for="new_password2">Confirm Password</label>
                                       <input name="new_password2" type="password" class="form-control" id="new_password2" placeholder="Confirm New Password" required>
                                    </div>
									<div class="form-group">
										<div id="result" > </div>
									</div>	
                                    <div class="form-group">
                                       <button type="submit" id="psubmit" class="btn btn-success btn-block">Update</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                     </ul>
                </li>
				<li id="logout"><a href="<?php echo base_url();?>index.php?/login/logout">Log out</a></li>
			<?php else: ?>
			
				<li id="signup"><a href="<?php echo base_url();?>index.php?/login/signup">Sign Up</a></li>
				<li id="signin"><a href="<?php echo base_url();?>index.php?/login">Sign In</a></li>
			<?php endif; ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>