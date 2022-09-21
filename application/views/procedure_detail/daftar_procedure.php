<p class="text-right">
	<a href ="<?php echo site_url('procedure_detail/daftar_procedure/' .$procedure->procedure_id) ?>" target="_blank" class = "btn btn-success">
		<i class="fa fa-print"></i> Cetak Daftar Procedure 
	</a>

	<a href ="<?php echo site_url('procedure_detail/export_procedure/' .$procedure->procedure_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export Ke Word 
	</a>

	<a href ="<?php echo site_url('procedure_detail') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">PROCEDURE ID - DESCRIPTION</th>
			<th> : <?php echo $procedure->procedure_id ?> - <?php echo $procedure->procedure_desc ?></th>
		</tr>
	</thead>
</table>

<hr>
<h3>DAFTAR PROSEDUR </h3>
<hr>
<?php include('detail_procedure.php'); ?>