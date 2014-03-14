    <div class="container">    
        <div id="loginbox" class="margin-nav mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">      

            <ul class="nav nav-pills nav-justified thumbnail">
              
                <li class="active"><a href="#">
                    <h4 class="list-group-item-heading">Verify</h4>
                    <p class="list-group-item-text">Verify your email by clicking the 'Activate' button</p>
                </a></li>
                <form id="tab" action="<?php echo base_url();?>index.php?/login/activate" method="post">
					<div class="hidden">
					<label>Email:</label>
					<input type="text" value="<?php echo $email; ?>" name="email" > 
					</div>
					<br>
					<div><strong>Your Email:　</strong><?php echo $email; ?></div><br>
				<div>
					<button class="btn btn-primary">Activate</button>
				</div>
				<br />
				</form>
            </ul>

	</div>
</div>