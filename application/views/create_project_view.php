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
<a href="<?= site_url('/'); ?>"> Welcome Screen</a>

<h1> Register</h1>
<?php echo form_open('project/create'); ?>
<p>
	<?php 
		echo form_label('BBI Project #:*', 'bbi_project_id');
 		echo form_input('bbi_project_id', set_value('bbi_project_id'),'id="bbi_project_id"');
	?>
</p>

<p>
	<?php 
		echo form_label('Project Name:', 'project_name');
 		echo form_input('project_name', set_value('project_name'),'id="project_name"');
	?>
</p>


<?php echo form_submit('submit', 'Create Project'); ?>
<?php echo form_close(); ?>
		
<div class="errors"><?php echo validation_errors(); ?></div>
</body>
</html>