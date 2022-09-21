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
		<h3> LIST OF GOAL STATUS </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">PARENT CODE</th>
			<th width = "25%">PARENT DESCRIPTION</th>
			<th width = "25%">CHILD CODE </th>
			<th width = "10%">PARENT VALUE </th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($hasilinferensi as $key => $hasilinferensi) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $hasilinferensi->parent_code ?></td>
			<td><?php echo $hasilinferensi->parent_desc ?></td>
			<td><?php echo $hasilinferensi->child_code ?></td>
			<td><?php echo $hasilinferensi->fact_value ?></td>
		</tr>

		<?php } ?>

		</tbody>
		</table>
	
	</div>
</body>
</html>