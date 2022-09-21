<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title?></title>
	<!-- panggil css print -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/print.css') ?> " media="screen">
	<!-- media print -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/print.css') ?> " media="print">
	
</head>
<body onload="print()">
	<div class="cetak">
		<h1> CETAK DATA PROJECT </h1>
		<table class ="table table-striped">
	<thead>
		<tr>
			<td width="25%">Project ID</td>
			<td> : <?php echo $project->project_id ?></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Project Name</td>
			<td> : <?php echo $project->project_name ?></td>
		</tr>

		<tr>
			<td>Project Description</td>
			<td>: <?php echo $project->project_desc ?></td>
		</tr>
	</tbody>
</table>
	
	</div>
</body>
</html>