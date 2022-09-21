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
		<h3> LIST OF SYSTEM OBJECT RELATION DATA </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "15%">PREDICATE</th>
			<th width = "25%">TERM1</th>
			<th width = "25%">TERM2</th>
			<th width = "5%">KODE TERM1</th>
			<th width = "5%">KODE TERM2</th>
			<th width = "20%">KETERANGAN</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($object_relation as $key => $object_relation) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $object_relation->predicate ?></td>
			<td><?php echo $object_relation->term1 ?></td>
			<td><?php echo $object_relation->term2 ?> </td>
			<td><?php echo $object_relation->kode_term1 ?> </td>
			<td><?php echo $object_relation->kode_term2 ?></td>
			<td><?php echo $object_relation->keterangan ?></td>
		</tr>

		<?php } ?>

		</tbody>
		</table>
	
	</div>
</body>
</html>