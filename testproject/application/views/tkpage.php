
  <div class="container">

      <div class="starter-template thankyou-style">
        <h1>Thank you. </h1>
		<?php if(isset($register)):?>
			<p> Your account has been activated!</p>
			<p>Please
			<a href="<?php echo base_url();?>index.php?/login" class=" btn-large"> Sign In</a> Here</p>
		<?php endif;?>
		<?php if(isset($reset)):?>
			<p> Your Password has been reset!</p>
			<p>Please
			<a href="<?php echo base_url();?>index.php?/login" class=" btn-large"> Sign In</a> Here</p>
		<?php endif;?>
		<?php if(isset($activate)):?>
			<p>Your account activation have send to your register email address</p>
	  <?php endif;?>
      </div>
	  
	  
    </div> <!-- /container -->
