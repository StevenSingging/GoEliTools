<p class="text-right">
	<a href ="<?php echo site_url('project_stakeholder/daftar_stakeholder/' .$project->project_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('project_stakeholder/export/' .$project->project_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export Ke Word 
	</a>

	<a href ="<?php echo site_url('project_stakeholder') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Project Name</th>
			<th> : <?php echo $project->project_id ?> - <?php echo $project->project_name ?></th>
		</tr>
	</thead>
</table>

<hr>
<h3>DAFTAR STAKEHOLDER PROJECT</h3>
<hr>
<?php include('index.php'); ?>