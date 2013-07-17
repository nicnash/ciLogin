<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>untitled</title>
</head>
<body>
	<h2>Welcome Back, <?php echo $this->session->userdata('email_address'); ?>!</h2>
     <p>This section represents the area that only logged in members can access.</p>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>
</body>
</html>	



	Hello <?php echo $current_user ?> 
	
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