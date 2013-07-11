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

<h1> Add User to Project</h1>
<?php echo form_open('add_project_user'); ?>
<p>
	<?php 
		echo form_label('Project Id:*', 'project_id');
 		echo form_input('project_id', set_value('project_id'),'id="project_id"');
	?>
</p>

<p>
	<?php 
		echo form_label('User ID:', 'user_id');
 		echo form_input('user_id', set_value('user_id'),'id="user_id"');
	?>
</p>

<p>
	<?php 
		echo form_label('Security level:', 'user_security_level');
 		echo form_input('user_security_level', set_value('user_security_level'),'id="user_security_level"');
	?>
</p>

<?php echo form_submit('submit', 'Add user to Project'); ?>
<?php echo form_close(); ?>
		
<div class="errors"><?php echo validation_errors(); ?></div>
</body>
</html>