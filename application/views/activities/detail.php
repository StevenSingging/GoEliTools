<p class="text-right">
	<a href ="<?php echo site_url('activities/edit/' .$activities->activities_id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Activities
	</a>

	<a href ="<?php echo site_url('activities/cetak/' .$activities->activities_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('activities') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Activities ID</th>
			<th> : <?php echo $activities->activities_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Project ID</td>
			<td>: <?php echo $activities->project_id?></td>
		</tr>
		<tr>
			<td>Project Name</td>
			<td>: <?php echo $project->project_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder ID</td>
			<td>: <?php echo $activities->stakeholder_id?></td>
		</tr>
		<tr>
			<td>Stakeholder Name</td>
			<td>: <?php echo $stakeholder->stakeholder_name ?></td>
		</tr>
		<tr>
			<td>Activities Description</td>
			<td>: <?php echo $activities->activities_desc ?></td>
		</tr>
		<?php 
		if(empty($activities->parent_activities_id)){
			echo "<tr>
					<td>Parent Goal</td>
					<td>: <?php echo $activities->goal_id ?></td>
				  </tr>
				  <tr>
					<td>Parent Goal Description</td>
					<td>: <?php echo $goal->goal_desc ?></td>
				  </tr>";
		}else{
			echo "<tr>
					<td>Parent activities</td>
					<td>: <?php echo $activities->parent_activities_id?></td>
				  </tr>
				  <tr>
					<td>Parent activities Description</td>
					<td>: <?php echo $activities->parent_activities_desc?></td>
				  </tr>";
		}?>
	</tbody>
</table>

