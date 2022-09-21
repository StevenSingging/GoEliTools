<p>
	<a href="<?php echo site_url('gore_analysis') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('gore_analysis/cetak_agent') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('gore_analysis/export_data_agent') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "10%">NO</th>
			<th width = "10%">CHILD CODE</th>
			<th width = "25%">CHILD DESCRIPTION</th>
			<th width = "25%">PRE CONDITION</th>
			<th width = "25%">POST CONDITION</th>

		</tr>
	</thead>
	<tbody>
		<?php  foreach ($agent as $key => $agent) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $agent->child_code ?></td>
			<td><?php echo $agent->child_desc ?></td>
			<td><?php echo $agent->pre_condition ?></td>
			<td><?php echo $agent->post_condition ?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>

