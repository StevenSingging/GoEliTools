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
		<h1> CETAK SELURUH STAKEHOLDER </h1>
		<table class="table table-bordered table striped table-sm" id="example1">
			<thead>
				<tr>
					<th width = "5%">NO</th>
					<th width = "10%">PROJECT ID</th>
					<th width = "25%">PROJECT NAME</th>
					<th width = "15%">PROJECT TYPE</th>
					<th width = "25%">PROJECT COMPETENCE</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($stakeholder as $key => $stakeholder) { ?> 

					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $stakeholder->stakeholder_id ?></td>
						<td><?php echo $stakeholder->stakeholder_name ?> </td>
						<td><?php echo $stakeholder->stakeholder_type ?> </td>
						<td><?php echo $stakeholder->stakeholder_competence ?></td>

					</tr>

				<?php } ?>

			</tbody>
		</table>
	</div>
</body>
</html>