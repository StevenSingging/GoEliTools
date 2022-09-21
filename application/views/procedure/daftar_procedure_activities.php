<p class="text-right">
	<a href ="<?php echo site_url('procedure/daftar_procedure_activities/' .$activities->activities_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak Daftar Procedure Activities
	</a>

	<a href ="<?php echo site_url('procedure/export_activities/' .$activities->activities_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export Ke Word 
	</a>

	<a href ="<?php echo site_url('procedure') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">ACTIVITIES ID - DESCRIPTION</th>
			<th> : <?php echo $activities->activities_id ?> - <?php echo $activities->activities_desc ?></th>
		</tr>
	</thead>
</table>

<hr>
<h3>DAFTAR PROSEDUR AKTIFITAS</h3>
<hr>
<?php include('detail_procedure_activities.php'); ?>