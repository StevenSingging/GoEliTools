<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan Daftar Goal Stakeholder';
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
	<h1> CETAK DAFTAR GOAL STAKEHOLDER </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
			  <tr>
				<th width="25%">Nama Stakeholder/th>
				<th> : <?php echo $stakeholder->stakeholder_name ?></th>
			</tr>
			<tr>
				<td>Stakeholder ID</td>
				<td>: <?php echo $stakeholder->stakeholder_id ?></td>
			</tr>
		    </thead>
		</table>

		<hr>
		<h3>DATA GOAL STAKEHOLDER</h3>
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
			<td><a href="<?php echo site_url('goal/project/'.$goal->project_id) ?>">
				<?php echo $goal->project_id ?>- <?php echo $goal->project_name ?>
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
</body>
</html>