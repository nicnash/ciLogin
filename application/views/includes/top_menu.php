<div class="top-right-user-info">
			<?php echo anchor('/', 'Home'); ?>
		<?php if($is_admin == 1): ?>
			 
			 			<?php echo anchor('/register', 'Create Account'); ?>

<!-- 			 <?php echo anchor('project', 'Projects'); ?> -->
<!-- 			 <a href="<?php echo site_url('/create_project'); ?>"> Create Project</a>  
 -->
 <!-- 			 <a href="<?php echo site_url('/add_project_user'); ?>"> Add Project User</a>  
 -->
		<?php endif; ?>
		

		<a href="<?php echo site_url('login/logout'); ?>"> Logout </a>

	</div>