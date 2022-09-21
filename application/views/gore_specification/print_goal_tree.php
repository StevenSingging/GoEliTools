<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title?></title>
	<!-- panggil css print -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print.css') ?> " media="screen">
	<!-- media print -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print.css') ?> " media="print">
	
</head>
<body onload="print()">
	<div class="cetak">
		<h3> GOAL TREE STRUCTURE </h3>
		<hr>
			
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
	
	</div>
</body>
</html>