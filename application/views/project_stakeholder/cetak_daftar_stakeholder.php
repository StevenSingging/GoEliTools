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
		<h1> CETAK DAFTAR STAKEHOLDER PROJECT </h1>
		
		<table class ="table table-striped">
			<thead>
				<tr>
					<td width="25%"><h3>Project Name</h3></td>
					<td> <h3>: <?php echo $project->project_id ?> - <?php echo $project->project_name ?></h3></td>
				</tr>
			</thead>
		</table>

		<hr>
		<h3>DAFTAR STAKEHOLDER PROJECT</h3>
		<hr>
		<table class="table table-bordered table striped table-sm" id="example1">
			<thead>
				<tr>
					<th width = "5%">NO</th>
					<th width = "25%">STAKEHOLDER</th>
					<th width = "10%">ROLE</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($project_stakeholder as $key => $project_stakeholder) { ?> 

				<tr>
					<td><?php echo $key+1; ?></td>
					
					<td><?php echo $project_stakeholder->stakeholder_id ?>- <?php echo $project_stakeholder->stakeholder_name ?>
					</td>

					<td><?php echo $project_stakeholder->stakeholder_role ?></td>
				</tr>

				<?php } ?>

			</tbody>
		</table>

	</div>
	
</body>
</html>
