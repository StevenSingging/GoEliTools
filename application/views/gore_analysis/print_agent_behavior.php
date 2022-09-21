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
		<h3> LIST OF AGENT BEHAVIOUR </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">CHILD CODE</th>
			<th width = "25%">CHILD DESCRIPTION</th>
			<th width = "25%">PRE CONDITION </th>
			<th width = "5%">PRE VALUE </th>
			<th width = "25%">POST CONDITION</th>
			<th width = "5%">POST VALUE </th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($agent as $key => $agent) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $agent->child_code ?></td>
			<td><?php echo $agent->child_desc ?></td>
			<td><?php echo $agent->pre_condition ?></td>
			<td><?php echo $agent->pre_value ?></td>
			<td><?php echo $agent->post_condition ?></td>
			<td><?php echo $agent->post_value ?></td>
		</tr>

		<?php } ?>

		</tbody>
		</table>
	
	</div>
</body>
</html>