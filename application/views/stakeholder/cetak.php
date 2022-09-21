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
		<h1> CETAK DATA STAKEHOLDER </h1>
		<table class ="table table-striped">
			<thead>
				<tr>
					<td width="25%">Stakeholder ID</td>
					<td> : <?php echo $stakeholder->stakeholder_id ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Stakeholder Name</td>
					<td> : <?php echo $stakeholder->stakeholder_name ?></td>
				</tr>

				<tr>
					<td>Stakeholder Type</td>
					<td> : <?php echo $stakeholder->stakeholder_type ?></td>
				</tr>

				<tr>
					<td>Stakeholder Competence</td>
					<td>: <?php echo $stakeholder->stakeholder_competence ?></td>
				</tr>
			</tbody>
		</table>

	</div>
</body>
</html>