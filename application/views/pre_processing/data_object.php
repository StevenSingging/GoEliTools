<p>
	<a href="<?php echo site_url('pre_processing') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('pre_processing/cetak_objek') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('pre_processing/export_data_objek') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "10%">PROJECT ID</th>
			<th width = "10%">STAKEHOLDER ID</th>
			<th width = "10%">OBJECT ID</th>
			<th width = "10%">OBJECT TYPE</th>
			<th width = "25%">OBJECT DESCRIPTION</th>
			<th width = "10%">PARENT ID</th>
			<th width = "10%">PARENT TYPE</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($object as $key => $object) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $object->project_id ?></td>
			<td><?php echo $object->stakeholder_id ?></td>
			<td><?php echo $object->object_id ?> </td>
			<td><?php echo $object->object_type ?> </td>
			<td><?php echo $object->object_desc ?></td>
			<td><?php echo $object->object_parent_id ?></td>
			<td><?php echo $object->object_parent_type ?></td>

		</tr>

		<?php } ?>

	</tbody>
</table>

