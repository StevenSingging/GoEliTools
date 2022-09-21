<p>
	<a href="<?php echo site_url('gore_specification') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('gore_specification/cetak_sequence_diagram') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('gore_specification/export_sequence_diagram') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "10%">NO SEQ</th>
			<th width = "30%">SEQUENCE NAME</th>
			<th width = "30%">OBJECT DESCRIPTION</th>
			<th width = "10%">OBJECT TYPE</th>
			<th width = "10%">OBJECT CODE</th>

		</tr>
	</thead>
	<tbody>
		<?php  foreach ($view_sequence_diagram as $key => $view_sequence_diagram) { ?> 

		<tr>
			<td><?php echo $view_sequence_diagram->id;?></td>
			<td><?php echo $view_sequence_diagram->no_sequence;?></td>
			<td><?php echo $view_sequence_diagram->sequence_name ?></td>
			<td><?php echo $view_sequence_diagram->object_1 ?></td>
			<td><?php echo $view_sequence_diagram->object_type ?></td>
			<td><?php echo $view_sequence_diagram->object_1_code ?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>
