<?php
// untuk mengenerate menjadi file word
$nama_file = 'Nama File Laporan - Daftar Stakeholder Project';
header("Content-type: application/vnd.ms-word");
header("Content-disposition: attachment;filename=".$nama_file.".doc");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="screen">
		h1 {
			font-size: 13px;
			font-weight: bold;
			text-align: center;
		}
		table {
			border:  solid thin #666;
			border-collapse: collapse;
		}
		td,th {
			padding: 6px 12px;
			text-align: left;
			vertical-align: top;
			border:  solid thin #666;
		}
		
	</style>
</head>
<body>
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
</body>
</html>