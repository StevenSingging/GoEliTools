<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - goal tree';
header("Content-type: application/vnd.ms-word");
header("Content-disposition: attachment;filename=".$nama_file.".doc");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="screen">
		h1 {
			font-size: 13px;
			font-weight: bold;
			text-align: center;
		}
		table {
			border:  solid thin #666;
			border-collapse: collapse;
		}
		td,th {
			padding: 6px 12px;
			text-align: left;
			vertical-align: top;
			border:  solid thin #666;
		}
		
	</style>
</head>
<body>
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
</body>
</html>