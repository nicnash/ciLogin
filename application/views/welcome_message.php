<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		margin-left: 15px;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	.top-right-user-info{
		text-align: right;
	}
	</style>
</head>
<body>
	Hello <?php echo $current_user ?> 
	<div class="top-right-user-info">

		<?php if($is_admin == 1): ?>
			 <a href="<?= site_url('/register'); ?>"> Create Account</a>  
			 <a href="<?= site_url('/create_project'); ?>"> Create Project</a>  
			 <a href="<?= site_url('/add_project_user'); ?>"> Add Project User</a>  

		<?php endif; ?>
		

		<a href="<?= site_url('/logout'); ?>"> Logout </a>

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

	<h2> Member List </h2>

	<?php 
		foreach( $userrow as $r){
			echo "<h4> " . $r->email_address . "</h4>";
		}
	?>


	<h2> Project List </h2>

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