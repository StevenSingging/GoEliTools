<p>
	<a href="<?php echo site_url('gore_specification') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('gore_specification/cetak_class_diagram') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('gore_specification/export_class_diagram') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "10%">NO</th>
			<th width = "20%">OBJECT CHILD</th>
			<th width = "10%">RELATION TYPE</th>
			<th width = "50%">OBJECT PARENT</th>

		</tr>
	</thead>
	<tbody>
		<?php  foreach ($view_class_diagram as $key => $view_class_diagram) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $view_class_diagram->object_1 ?></td>
			<td><?php echo $view_class_diagram->relation_type ?></td>
			<td><?php echo $view_class_diagram->object_2 ?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>
