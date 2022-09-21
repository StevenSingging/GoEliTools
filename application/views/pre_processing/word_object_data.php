<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - Daftar Objek Sistem';
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
	<h3> LIST OF SYSTEM DATA OBJECT </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "10%">PROJECT ID</th>
			<th width = "10%">STAKEHOLDER ID</th>
			<th width = "10%">OBJECT ID</th>
			<th width = "10%">OBJECT TYPE</th>
			<th width = "25%">OBJECT DESCRIPTION</th>
			<th width = "10%">PARENT ID</th>
			<th width = "10%">PARENT TYPE</th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($object as $key => $object) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $object->project_id ?></td>
			<td><?php echo $object->stakeholder_id ?></td>
			<td><?php echo $object->object_id ?> </td>
			<td><?php echo $object->object_type ?> </td>
			<td><?php echo $object->object_desc ?></td>
			<td><?php echo $object->object_parent_id ?></td>
			<td><?php echo $object->object_parent_type ?></td>

		</tr>

		<?php } ?>
		
		</tbody>
		</table>
</body>
</html>