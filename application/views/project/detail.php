<p class="text-right">
	<a href ="<?php echo site_url('project/edit/' .$project->project_id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Project
	</a>

	<a href ="<?php echo site_url('project/cetak/' .$project->project_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('project') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Project ID</th>
			<th> : <?php echo $project->project_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th >Project Name</th>
			<th> : <?php echo $project->project_name ?></th>
		</tr>

		<tr>
			<td>Project Description</td>
			<td>: <?php echo $project->project_desc ?></td>
		</tr>
	</tbody>
</table>

