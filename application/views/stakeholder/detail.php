<p class="text-right">
	<a href ="<?php echo site_url('stakeholder/edit/' .$stakeholder->stakeholder_id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Stakeholder
	</a>

	<a href ="<?php echo site_url('stakeholder/cetak/' .$stakeholder->stakeholder_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('stakeholder') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Stakeholder ID</th>
			<th> : <?php echo $stakeholder->stakeholder_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th >Stakeholder Name</th>
			<th> : <?php echo $stakeholder->stakeholder_name ?></th>
		</tr>

		<tr>
			<th >Stakeholder Type</th>
			<th> : <?php echo $stakeholder->stakeholder_type ?></th>
		</tr>
		<tr>
			<td>Stakeholder Description</td>
			<td>: <?php echo $stakeholder->stakeholder_competence ?></td>
		</tr>
		<tr>
			<td>User Entry</td>
			<td>: <?php echo $stakeholder->id_user ?> - <?php echo $stakeholder->nama_user ?></td>
		</tr>
		<tr>
			<td>Post Date</td>
			<td>: <?php echo $stakeholder->post_date ?></td>
		</tr>
		<tr>
			<td>Update Date</td>
			<td>: <?php echo $stakeholder->update_date ?></td>
		</tr>
	</tbody>
</table>

