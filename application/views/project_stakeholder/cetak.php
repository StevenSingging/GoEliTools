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
		<h1> CETAK DATA PROJECT STAKEHOLDER </h1>
		
		<table class ="table table-striped">
			<thead>
				<tr>
					<td width="25%">ID</td>
					<td> : <?php echo $project_stakeholder->id ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Project Name</td>
					<td>: <?php echo $project_stakeholder->project_id ?> - <?php echo $project_stakeholder->project_name ?></td>
				</tr>
				<tr>
					<td>Stakeholder Name </td>
					<td>: <?php echo $project_stakeholder->stakeholder_id ?> - <?php echo $project_stakeholder->stakeholder_name ?></td>
				</tr>
				<tr>
					<td>Stakeholder Role</td>
					<td>: <?php echo $project_stakeholder->stakeholder_role ?></td>
				</tr>
				<tr>
					<td>User Entry</td>
					<td>: <?php echo $project_stakeholder->id_user ?> - <?php echo $project_stakeholder->nama_user ?></td>
				</tr>
				<tr>
					<td>Post Date</td>
					<td>: <?php echo $project_stakeholder->post_date ?></td>
				</tr>
				<tr>
					<td>Update Date</td>
					<td>: <?php echo $project_stakeholder->update_date ?></td>
				</tr>

			</tbody>
		</table>

		
		<h3>DATA STAKEHOLDER</h3>
		<hr>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<td width="25%">Stakeholder ID</td>
					<td> : <?php echo $project_stakeholder->stakeholder_id ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td >Stakeholder Name</td>
					<td> : <?php echo $project_stakeholder->stakeholder_name ?></td>
				</tr>

				<tr>
					<td >Stakeholder Type</th>
					<td> : <?php echo $project_stakeholder->stakeholder_type ?></td>
				</tr>
				<tr>
					<td>Stakeholder Description</td>
					<td>: <?php echo $project_stakeholder->stakeholder_competence ?></td>
				</tr>
			</tbody>
		</table>


	</div>
</body>
</html>