<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - sequence diagram';
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
	<h3> SEQUENCE DIAGRAM </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "10%">NO SEQ</th>
			<th width = "30%">SEQUENCE NAME</th>
			<th width = "30%">OBJECT DESCRIPTION</th>
			<th width = "10%">OBJECT TYPE</th>
			<th width = "10%">OBJECT CODE</th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($view_sequence_diagram as $key => $view_sequence_diagram) { ?> 

		<tr>
			<td><?php echo $view_sequence_diagram->id;?></td>
			<td><?php echo $view_sequence_diagram->no_sequence;?></td>
			<td><?php echo $view_sequence_diagram->sequence_name ?></td>
			<td><?php echo $view_sequence_diagram->object_1 ?></td>
			<td><?php echo $view_sequence_diagram->object_type ?></td>
			<td><?php echo $view_sequence_diagram->object_1_code ?></td>

		</tr>

		<?php } ?>
		
		</tbody>
		</table>
</body>
</html>