<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - class diagram relation';
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
	<h3> CLASS DIAGRAM RELATION </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "10%">NO</th>
			<th width = "20%">OBJECT CHILD</th>
			<th width = "10%">RELATION TYPE</th>
			<th width = "50%">OBJECT PARENT</th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($view_class_diagram as $key => $view_class_diagram) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $view_class_diagram->object_1 ?></td>
			<td><?php echo $view_class_diagram->relation_type ?></td>
			<td><?php echo $view_class_diagram->object_2 ?></td>

		</tr>

		<?php } ?>
		
		</tbody>
		</table>
</body>
</html>