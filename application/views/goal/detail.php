<p class="text-right">
	<a href ="<?php echo site_url('goal/edit/' .$goal->goal_id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Goal
	</a>

	<a href ="<?php echo site_url('goal/cetak/' .$goal->goal_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('goal') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Goal ID</th>
			<th> : <?php echo $goal->goal_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Project ID</td>
			<td>: <?php echo $goal->project_id?></td>
		</tr>
		<tr>
			<td>Project Name</td>
			<td>: <?php echo $project->project_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder ID</td>
			<td>: <?php echo $goal->stakeholder_id?></td>
		</tr>
		<tr>
			<td>Stakeholder Name</td>
			<td>: <?php echo $stakeholder->stakeholder_name ?></td>
		</tr>
		<tr>
			<td>Goal/ Fitur Description</td>
			<td>: <?php echo $goal->goal_desc ?></td>
		</tr>
		<tr>
			<td>Goal Type</td>
			<td>: <?php echo $goal->goal_type ?></td>
		</tr>
		<tr>
			<td>Parent goal</td>
			<td>: <?php echo $goal->parent_goal_id?></td>
		</tr>
		<tr>
			<td>Parent goal Description</td>
			<td>: <?php echo $goal->parent_goal_desc?></td>
		</tr>
	</tbody>
</table>

