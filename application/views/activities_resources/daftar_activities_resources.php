<p class="text-right">
	<a href ="<?php echo site_url('activities_resources/daftar_activities_resources/' .$activities->activities_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak Daftar Activities Resources
	</a>

	<a href ="<?php echo site_url('activities_resources/export_activities_resources/' .$activities->activities_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export Ke Word 
	</a>

	<a href ="<?php echo site_url('activities_resources') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
				<th width="25%">Activities ID - Description</th>
				<th> : <?php echo $activities->activities_id ?> - 
						<?php echo $activities->activities_desc ?></th>
			  </tr>
	</thead>
</table>

<hr>
<h3>DAFTAR SUMBER DAYA AKTIVITAS</h3>
<hr>
<?php include('detail_activities_resources.php'); ?>