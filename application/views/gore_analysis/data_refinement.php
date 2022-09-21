<p>
	<a href="<?php echo site_url('gore_analysis') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('gore_analysis/cetak_refinement') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('gore_analysis/export_data_refinement') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "10%">PARENT CODE</th>
			<th width = "25%">PARENT DESCRIPTION</th>
			<th width = "25%">CHILD CODE</th>
			<th width = "5%">LEVEL</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($refinement as $key => $refinement) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $refinement->parent_code ?></td>
			<td><?php echo $refinement->parent_desc ?></td>
			<td><?php echo $refinement->child_code ?></td>
			<td><?php echo $refinement->level ?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>

