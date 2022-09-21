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
		<h3> CLASS DIAGRAM RELATION </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "20%">OBJECT CHILD</th>
			<th width = "10%">OBJECT TYPE</th>
			<th width = "10%">RELATION TYPE</th>
			<th width = "50%">OBJECT PARENT</th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($view_use_case_diagram as $key => $view_use_case_diagram) { ?>
		
		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $view_use_case_diagram->object_1 ?></td>
			<td><?php echo $view_use_case_diagram->object_type ?></td>
			<td><?php echo $view_use_case_diagram->relation_type ?></td>
			<td><?php echo $view_use_case_diagram->object_2 ?></td>
		</tr>

		<?php } ?>

		</tbody>
		</table>
	
	</div>
</body>
</html>