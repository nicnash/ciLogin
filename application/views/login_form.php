
<div id="login_form">
	<h1>BBI Portal Login</h1>
	<?php echo form_open('login/validate_credentials'); ?>
	<p>
		<?php 
			// echo form_label('Email Address:', 'email_address');
	 		echo form_input('email_address', set_value('email_address', 'Email Address'));
	 		// echo form_input('first_name', );

		?>
	</p>

	<p>
		<?php 
			// echo form_label('Password:', 'password');
	 		echo form_password('password','Password','id="password"');
	 		// echo form_hidden('url', 'login');
		?>
	</p>

	<?php echo form_submit('submit', 'Login'); ?>
	<?php echo form_close(); ?>

	<div class="errors"><?php echo validation_errors(); ?></div>
</div>
