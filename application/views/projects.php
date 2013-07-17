<h2>My Projects</h2>
			 			<?php echo anchor('/project/create', 'Create Project'); ?>


		<?php 

			foreach( $projects as $r){
				echo "<div class=\"project_overview\">";
					echo anchor('/project/' . $r->project_id, $r->project_name);
				echo "</div>";
				// echo "<h4> " . $r->project_name . "</h4>";
			}
		?>