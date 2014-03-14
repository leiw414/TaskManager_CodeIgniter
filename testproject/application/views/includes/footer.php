
            <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script type="text/javascript">
	//popup window
	function popupwindow(url, title, w, h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    popupWindow =  window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
     return popupWindow
   } 
</script>
<script type="text/javascript">

	// when user click the eye icon on the login page

	$(".reveal").mousedown(function() {//reveal password
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'text'));
	})
	.mouseout(function() {//hide the password
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	});
</script>

<script type="text/javascript">
//filter function
(function(){
	var $ = jQuery;
	$.fn.extend({
		filterTable: function(){
			return this.each(function(){
				$(this).on('keyup', function(e){
					//empty filter
					$('.filterTable_no_results').remove();
					var $this = $(this), search = $this.val().toLowerCase(), target = $this.attr('data-filters'), $target = $(target), $rows = $target.find('tbody tr');
					//when user cancel the search 
					if(search == '') {
						$rows.show(); 
					} 
					else {
						
						$rows.each(function(){
							var $this = $(this);
							$this.text().toLowerCase().indexOf(search) == -1 ? $this.hide() : $this.show();
						})
						//no result found
						if($target.find('tbody tr:visible').size() == 0) {
							var no_results = $('<tr class="filterTable_no_results"><td >No results found</td></tr>')
							$target.find('tbody').append(no_results);
						}
					}
				});
			});
		}
	});
	
})(jQuery);

// attach table filter plugin to inputs
$('[data-action="filter"]').filterTable();

//SlidToggle function
$(function(){

	// SlideToggle when click .panel-heading span.filter(Task & icon)
	$('.container').on('click', '.panel-heading span.filter', function(e){
		var $this = $(this), 
				$panel = $this.parents('.panel');
		
		$panel.find('.panel-body').slideToggle();
		//focus after sildtogggle out
		if($this.css('display') != 'none') {
			$panel.find('.panel-body input').focus();
		}
	});
	//call tooltip
	$('[data-toggle="tooltip"]').tooltip();
})	

</script>

<script type="text/javascript">
//password submit form validation and ajax 
$('#psubmit').click(function() {
	
	var old_password = $('#old_password').val();
	var new_password = $('#new_password').val();
	var new_password2 = $('#new_password2').val();
	
	//check old_password field
	if (!old_password) {
	
		$("#result").empty();
		$("#result").append("<span class='error'>Please Enter Your Old Password</span>");
		return false;
	}
	
	//check new password field
	if (!new_password || new_password.length < 6) {
		$("#result").empty();
		$("#result").append("<p class='error'>Your New Password should have miniumum 4 chars</p>");
		return false;
	}
	
	//check confirm new password field
	if (!new_password2) {
	
		$("#result").empty();
		$("#result").append("<p class='error'>Please Confirm Your New Password</p>");
		return false;
	}
	
	//check new password and confirm new password field
	if (new_password != new_password2) {
        //alert("Passwords Do not match");
		$("#result").empty();
		$("#result").append("<p class='error'>New Passwords Do Not Match!</p>");
		return false;
    }
	
	//get data
	var form_data = {
		old_password: $('#old_password').val(),
		new_password: $('#new_password').val(),
		new_password2: $('#new_password2').val(),
		ajax: '1'		
	};
	
	pathArray = window.location.href.split( '/' );
	protocol = pathArray[0];

	var url = protocol + '' + "index.php?/passwd/update" ;
	
	//ajax
	$.ajax({
		url: url,
		type: 'POST',
		data: form_data,
		success: function(msg) {
			$('#message').html(msg);
		}
	});
	
	return false;
});
</script>
	
  </body>
</html>