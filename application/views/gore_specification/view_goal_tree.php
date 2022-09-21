<p>
	<a href="<?php echo site_url('gore_specification') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('gore_specification/cetak_goal_tree') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('gore_specification/export_goal_tree') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "10%">NO</th>
			<th width = "30%">PARENT DESCRIPTION</th>
			<th width = "5%">PARENT CODE</th>
			<th width = "10%">PARENT TYPE</th>
			<th width = "25%">CHILD CODE</th>
			<th width = "10%">LEVEL</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($view_goal_tree as $key => $view_goal_tree) { ?> 

		<tr>
			<td><?php echo $view_goal_tree->id ?></td>
			<td><?php echo $view_goal_tree->parent_desc ?></td>
			<td><?php echo $view_goal_tree->parent_code ?></td>
			<td><?php echo $view_goal_tree->parent_type ?></td>
			<td><?php echo $view_goal_tree->child_code ?></td>
			<td><?php echo $view_goal_tree->level?></td>
		</tr>

		<?php } ?>

	</tbody>
</table>
