<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">


	</style>
</head>
<body>
	Hello <?php echo $current_user ?> 
	<div class="top-right-user-info">
			 <a href="<?php echo site_url('/welcome'); ?>"> Home</a>  

		<?php if($is_admin == 1): ?>
			 <a href="<?php echo site_url('/register'); ?>"> Create Account</a>  
			 <a href="<?php echo site_url('/create_project'); ?>"> Create Project</a>  
			 <a href="<?php echo site_url('/add_project_user'); ?>"> Add Project User</a>  

		<?php endif; ?>
		

		<a href="<?php echo site_url('/logout'); ?>"> Logout </a>

	</div>
<h1> kickass Members only page</h1>

<?php if($userProjectRow!=null): ?>		

	<h2>My Projects</h2>

		<?php 

			foreach( $userProjectRow as $r){
				$url = site_url('/project\/') . $r->project_id;
		echo "<a href=" . $url . ">" . $r->project_name . "</a> " ;
				// echo "<h4> " . $r->project_name . "</h4>";
			}
		?>
<?php endif; ?>




<?php if($is_admin == 1): ?>

	<h2> Admin Member List </h2>

	<?php 
		foreach( $userrow as $r){
			echo "<h4> " . $r->email_address . "</h4>";
		}
	?>


	<h2> Admin Project List </h2>

	<?php 
		foreach( $projectrow as $pr){
			// print_r($pr);
			// $url = site_url('/project/') . $pr->project_id;
			// echo "<a href=" . $url . ">" . $pr->project_name . "</a> " ;
			$url = site_url('/project\/') . $pr->id;
			echo "<a href=" . $url . ">" . $pr->project_name . "</a> " ;
			// echo "<h4> " . $pr->project_name . "</h4>";
		}
	?>
<?php endif; ?>

</body>
</html>