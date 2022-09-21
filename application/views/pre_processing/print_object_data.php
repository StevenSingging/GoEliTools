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
		<h3> LIST OF SYSTEM DATA OBJECT </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "10%">PROJECT ID</th>
			<th width = "10%">STAKEHOLDER ID</th>
			<th width = "10%">OBJECT ID</th>
			<th width = "10%">OBJECT TYPE</th>
			<th width = "25%">OBJECT DESCRIPTION</th>
			<th width = "10%">PARENT ID</th>
			<th width = "10%">PARENT TYPE</th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($object as $key => $object) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $object->project_id ?></td>
			<td><?php echo $object->stakeholder_id ?></td>
			<td><?php echo $object->object_id ?> </td>
			<td><?php echo $object->object_type ?> </td>
			<td><?php echo $object->object_desc ?></td>
			<td><?php echo $object->object_parent_id ?></td>
			<td><?php echo $object->object_parent_type ?></td>

		</tr>

		<?php } ?>

		</tbody>
		</table>
	
	</div>
</body>
</html>