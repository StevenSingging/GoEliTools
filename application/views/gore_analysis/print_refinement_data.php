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
		<h3> LIST OF GORE DATA REFINEMENT </h3>
		<hr>
			
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
	
	</div>
</body>
</html>