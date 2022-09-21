<p class="text-right">
	<a href ="<?php echo site_url('activities/daftar_activities_project/' .$project->project_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak Daftar Activities Project
	</a>

	<a href ="<?php echo site_url('activities/export_project/' .$project->project_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export Ke Word 
	</a>

	<a href ="<?php echo site_url('activities') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Nama Project</th>
			<th> : <?php echo $project->project_name ?></th>
		</tr>
		<tr>
			<td>Project ID</td>
			<td>: <?php echo $project->project_id ?></td>
		</tr>
	</thead>
</table>

<hr>
<h3>DAFTAR GOAL</h3>
<hr>
<?php include('detail_activities_project.php'); ?>