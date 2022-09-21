<p>
	<a href="<?php echo site_url('pre_processing') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('pre_processing/cetak_relasi_objek') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('pre_processing/export_data_relasi_objek') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "15%">PREDICATE</th>
			<th width = "25%">TERM1</th>
			<th width = "25%">TERM2</th>
			<th width = "5%">KODE TERM1</th>
			<th width = "5%">KODE TERM2</th>
			<th width = "20%">KETERANGAN</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($object_relation as $key => $object_relation) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $object_relation->predicate ?></td>
			<td><?php echo $object_relation->term1 ?></td>
			<td><?php echo $object_relation->term2 ?> </td>
			<td><?php echo $object_relation->kode_term1 ?> </td>
			<td><?php echo $object_relation->kode_term2 ?></td>
			<td><?php echo $object_relation->keterangan ?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>

