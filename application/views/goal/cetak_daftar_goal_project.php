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
		<h1> CETAK DAFTAR GOAL PROJECT </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
			  <tr>
				<th width="25%">Nama Project</th>
				<th> : <?php echo $project->project_name ?></th>
			  </tr>
			  <tr>
				<td>Project ID</td>
				<td>: <?php echo $project->project_id ?></td>
			  </tr>
		    </thead>
		</table>

		<hr>
		<h3>DAFTAR GOAL PROJECT</h3>
		<hr>
		
		<table class="table table-bordered table striped table-sm" id="example1">
			<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "15%">STAKEHOLDER</th>
			<th width = "5%">GOAL ID</th>
			<th width = "20%">GOAL DESCRIPTION</th>
			<th width = "5%">GOAL Type</th>
			<th width = "5%">PARENT GOAL</th>
			<th width = "20%">PARENT DESCRIPTION</th>
			</tr>
	</thead>
	<tbody>
		<?php foreach ($goal as $key => $goal) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo site_url('goal/stakeholder/'.$goal->stakeholder_id) ?>">
				<?php echo $goal->stakeholder_id ?>- <?php echo $goal->stakeholder_name ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><?php echo $goal->goal_id ?> </td>
			<td><?php echo $goal->goal_desc ?> </td>
			<td><?php echo $goal->goal_type ?></td>
			<td><?php echo $goal->parent_goal_id ?></td>
			<td><?php echo $goal->parent_goal_desc?></td>
		</tr>

		<?php } ?>

	</tbody>
	</table>
	
	</div>
</body>
</html>