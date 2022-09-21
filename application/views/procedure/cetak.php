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
		<h1> CETAK DATA PROCEDURE </h1>
		<hr>
		<table class ="table table-striped">
		
		<thead>
		<tr>
			<td width="25%">Procedure ID</td>
			<td> : <?php echo $procedure->procedure_id ?></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Project ID</td>
			<td>: <?php echo $procedure->project_id?></td>
		</tr>
		<tr>
			<td>Project Name</td>
			<td>: <?php echo $project->project_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder ID</td>
			<td>: <?php echo $procedure->stakeholder_id?></td>
		</tr>
		<tr>
			<td>Stakeholder Name</td>
			<td>: <?php echo $stakeholder->stakeholder_name ?></td>
		</tr>
		<tr>
			<td>Procedure Description</td>
			<td>: <?php echo $procedure->procedure_desc ?></td>
		</tr>
		<tr>
			<td>Activities ID - Desc</td>
			<td>: <?php echo $procedure->activities_id?> - <?php echo $procedure->activities_desc?></td>
		</tr>
		<tr>
			<td>Actor</td>
			<td>: <?php echo $procedure->actor ?></td>
		</tr>
		<tr>
			<td>Resources</td>
			<td>: <?php echo $procedure->resources ?></td>
		</tr>
	</tbody>
	
	</div>
</body>
</html>