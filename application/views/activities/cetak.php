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
		<h1> CETAK DATA GOAL </h1>
		<hr>
		<table class ="table table-striped">
		
		<tr>
			<td width="25%">Activities ID</td>
			<td> : <?php echo $activities->activities_id ?></td>
		</tr>
		
		<tbody>
		<tr>
			<td>Project ID</td>
			<td>: <?php echo $activities->project_id?></td>
		</tr>
		<tr>
			<td>Project Name</td>
			<td>: <?php echo $project->project_name ?></td>
		</tr>
		<tr>
			<td>Stakeholder ID</td>
			<td>: <?php echo $activities->stakeholder_id?></td>
		</tr>
		<tr>
			<td>Stakeholder Name</td>
			<td>: <?php echo $stakeholder->stakeholder_name ?></td>
		</tr>
		<tr>
			<td>Activities Description</td>
			<td>: <?php echo $activities->activities_desc ?></td>
		</tr>
		<tr>
			<td>Parent activities</td>
			<td>: <?php echo $activities->parent_activities_id?></td>
		</tr>
		<tr>
			<td>Parent Goal</td>
			<td>: <?php echo $activities->goal_id ?></td>
		</tr>
		<tr>
			<td>Parent Goal Description</td>
			<td>: <?php echo $goal->goal_desc ?></td>
		</tr>
	</tbody>
	
	</div>
</body>
</html>