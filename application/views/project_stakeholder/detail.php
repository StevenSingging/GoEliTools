<p class="text-right">
	<a href ="<?php echo site_url('project_stakeholder/edit/' .$project_stakeholder->id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Data Project Stakeholder
	</a>

	<a href ="<?php echo site_url('project_stakeholder/cetak/' .$project_stakeholder->id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('project_stakeholder') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">ID</th>
			<th> : <?php echo $project_stakeholder->id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Project Name</td>
			<td>: <?php echo $project_stakeholder->project_id ?> - <?php echo $project_stakeholder->project_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder Name </td>
			<td>: <?php echo $project_stakeholder->stakeholder_id ?> - <?php echo $project_stakeholder->stakeholder_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder Role</td>
			<td>: <?php echo $project_stakeholder->stakeholder_role ?></td>
		</tr>
		<tr>
			<td>User Entry</td>
			<td>: <?php echo $project_stakeholder->id_user ?> - <?php echo $project_stakeholder->nama_user ?></td>
		</tr>
		<tr>
			<td>Post Date</td>
			<td>: <?php echo $project_stakeholder->post_date ?></td>
		</tr>
		<tr>
			<td>Update Date</td>
			<td>: <?php echo $project_stakeholder->update_date ?></td>
		</tr>
		
	</tbody>
</table>

<hr>
<h3>DATA STAKEHOLDER</h3>
<hr>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th width="25%">Stakeholder ID</th>
			<th> : <?php echo $project_stakeholder->stakeholder_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th >Stakeholder Name</th>
			<th> : <?php echo $project_stakeholder->stakeholder_name ?></th>
		</tr>

		<tr>
			<th >Stakeholder Type</th>
			<th> : <?php echo $project_stakeholder->stakeholder_type ?></th>
		</tr>
		<tr>
			<td>Stakeholder Description</td>
			<td>: <?php echo $project_stakeholder->stakeholder_competence ?></td>
		</tr>
	</tbody>
</table>
