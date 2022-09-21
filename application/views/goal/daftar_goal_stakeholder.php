<p class="text-right">
	<a href ="<?php echo site_url('goal/daftar_goal_stakeholder/' .$stakeholder->stakeholder_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak Daftar Goal Stakeholder
	</a>

	<a href ="<?php echo site_url('goal/export_stakeholder/' .$stakeholder->stakeholder_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export Ke Word 
	</a>

	<a href ="<?php echo site_url('goal') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Nama Stakeholder/th>
			<th> : <?php echo $stakeholder->stakeholder_name ?></th>
		</tr>
		<tr>
			<td>Stakeholder ID</td>
			<td>: <?php echo $stakeholder->stakeholder_id ?></td>
		</tr>
	</thead>
</table>

<hr>
<h3>DAFTAR GOAL</h3>
<hr>
<?php include('detail_goal_stakeholder.php'); ?>