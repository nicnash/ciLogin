<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>untitled</title>

	<style> 
		label {display:block;} 
		.errors { color: red } 
	</style>

</head>

<body>
<a href="<?= site_url('/admin'); ?>"> Welcome Screen</a>

<h1> Register</h1>
<?php echo form_open('register'); ?>
<p>
	<?php 
		echo form_label('First Name:*', 'first_name');
 		echo form_input('first_name', set_value('first_name'),'id="first_name"');
	?>
</p>

<p>
	<?php 
		echo form_label('Last Name:', 'last_name');
 		echo form_input('last_name', set_value('last_name'),'id="last_name"');
	?>
</p>

<p>
	<?php 
		echo form_label('Email Address:*', 'email_address');
 		echo form_input('email_address', set_value('email_address'),'id="email_address"');
	?>
</p>


<p>
	<?php 
		echo form_label('Password:*', 'password');
 		echo form_password('password','','id="password"');
 		// echo form_hidden('url', 'register');

	?>
</p>

<p>
	<?php 
		echo form_label('Admin (0,1)', 'admin');
 		echo form_input('admin', set_value('admin'),'id="admin"');
	?>
</p>

<?php echo form_submit('submit', 'Create'); ?>
<?php echo form_close(); ?>
		
<div class="errors"><?php echo validation_errors(); ?></div>
</body>
</html>