
<div class="container">
    <div class='row margin-nav' >
		<div class='col-md-4'></div>
        <div class='col-md-4'>
          <form method="post" action ="<?php echo base_url();?>index.php?/login/resetpw/<?php echo $passwd ;?>/<?php echo $status ;?>">
		  <?php if (isset($success)): ?>
					 <tr>
					 <td class="wz"></td>
					 <td>
						<span class="error">
						Reset Password Successfully!
					</span>
					 </td>
					 </tr>
				<?php endif; ?>
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Password</label>
                <input type="password" id="password" name="new_passwd" class='form-control' size='4' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Confirm Password</label>
                <input  type="password" id="password_confirm" name="new_passwd2" autocomplete='off' class='form-control card-number' size='20' type='text'>
              </div>
            </div>

            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary submit-button' type='submit'>Reset</button>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
                </div>
              </div>
            </div>
			<?php echo validation_errors('<p class="error"> *'); ?>
          </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>