
			<form id="signin_parent" class="form-signin" method="post">
			<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Parent</h3>
			<input type="text" class="input-block-level" id="username" name="username" placeholder="ID Number" required>
			<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname" required>
			<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname" required>
			<input type="text" class="input-block-level" id="student_un" name="student_un" placeholder="Child's id" required>
			<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
			<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
			<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign in</button>
			</form>
			
			
			
			<script>
  jQuery(document).ready(function() {
    console.log('Document ready.'); // Add this console.log statement

    jQuery("#signin_parent").submit(function(e) {
      console.log('Form submit event.'); // Add this console.log statement

      e.preventDefault();

      var password = jQuery('#password').val();
      var cpassword = jQuery('#cpassword').val();

      if (password == cpassword) {
        console.log('Passwords match.'); // Add this console.log statement

        var formData = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          url: "parent_signup.php",
          data: formData,
          success: function(html) {
            console.log('AJAX success.'); // Add this console.log statement

            if (html == 'true') {
              // ...
            } else if (html == 'false') {
              // ...
            }
          }
        });

      } else {
        console.log('Passwords do not match.'); // Add this console.log statement

        // ...
      }
    });
  });
</script>


		
			<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
			
			
			
				
		
					