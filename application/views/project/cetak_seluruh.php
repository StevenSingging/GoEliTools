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
		<h1> CETAK SELURUH DATA PROJECT </h1>
		<table class="table table-bordered table striped table-sm" id="example1">
			<thead>
				<tr>
					<th width = "5%">NO</th>
					<th width = "10%">PROJECT ID</th>
					<th width = "25%">PROJECT NAME</th>
					<th width = "35%">PROJECT DESCRIPTION</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($project as $key => $project) { ?> 

					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $project->project_id ?></td>
						<td><?php echo $project->project_name ?> </td>
						<td><?php echo $project->project_desc ?></td>

					</tr>

				<?php } ?>

			</tbody>
		</table>
	</div>
</body>
</html>