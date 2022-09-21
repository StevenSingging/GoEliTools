<p class="text-right">
	<a href ="<?php echo site_url('activities/daftar_activities_stakeholder/' .$stakeholder->stakeholder_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak Daftar Activities Stakeholder
	</a>

	<a href ="<?php echo site_url('activities/export_stakeholder/' .$stakeholder->stakeholder_id) ?>" class = "btn btn-primary" target="_blank">
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
<h3>DAFTAR ACTIVITIES</h3>
<hr>
<?php include('detail_activities_stakeholder.php'); ?>