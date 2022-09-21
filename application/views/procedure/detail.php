<p class="text-right">
	<a href ="<?php echo site_url('procedure/edit/' .$procedure->procedure_id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Procedure
	</a>

	<a href ="<?php echo site_url('procedure/cetak/' .$procedure->procedure_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('procedure') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Procedure ID</th>
			<th> : <?php echo $procedure->procedure_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Project ID</td>
			<td>: <?php echo $procedure->project_id?></td>
		</tr>
		<tr>
			<td>Project Name</td>
			<td>: <?php echo $project->project_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder ID</td>
			<td>: <?php echo $procedure->stakeholder_id?></td>
		</tr>
		<tr>
			<td>Stakeholder Name</td>
			<td>: <?php echo $stakeholder->stakeholder_name ?></td>
		</tr>
		<tr>
			<td>Procedure Description</td>
			<td>: <?php echo $procedure->procedure_desc ?></td>
		</tr>
		<tr>
			<td>Activities ID - Desc</td>
			<td>: <?php echo $procedure->activities_id?> - <?php echo $procedure->activities_desc?></td>
		</tr>
		<tr>
			<td>Actor</td>
			<td>: <?php echo $procedure->actor ?></td>
		</tr>
		<tr>
			<td>Resources</td>
			<td>: <?php echo $procedure->resources ?></td>
		</tr>
	</tbody>
</table>

