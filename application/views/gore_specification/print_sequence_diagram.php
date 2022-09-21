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
		<h3> SEQUENCE DIAGRAM </h3>
		<hr>
			
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
	
	</div>
</body>
</html>