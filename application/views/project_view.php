<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>untitled</title>
	<style> 
	.top-right-user-info{
		text-align: right;
	}
	label {display:block;} .errors { color: red } </style>
	</head>

<body>


	<div class="top-right-user-info">

		<?php if($is_admin == 1): ?>
			 <a href="<?= site_url('/welcome'); ?>"> Home</a>  
			 <a href="<?= site_url('/register'); ?>"> Create Account</a>  
			 <a href="<?= site_url('/create_project'); ?>"> Create Project</a>  
			 <a href="<?= site_url('/add_project_user'); ?>"> Add Project User</a>  

		<?php endif; ?>
		

		<a href="<?= site_url('/logout'); ?>"> Logout </a>

	</div>
<?php
// print_r($project_info);
echo $project_info->bbi_project_id. "<br>";
echo $project_info->project_name. "<br>";

?>



</body>
</html>