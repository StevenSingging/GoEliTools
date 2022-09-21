<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - Daftar Relasi Objek Sistem';
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
	<h3> LIST OF SYSTEM DATA RELASI OBJECT </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">ID</th>
			<th width = "15%">PREDICATE</th>
			<th width = "25%">TERM1</th>
			<th width = "25%">TERM2</th>
			<th width = "5%">KODE TERM1</th>
			<th width = "5%">KODE TERM2</th>
			<th width = "20%">KETERANGAN</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($object_relation as $key => $object_relation) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $object_relation->predicate ?></td>
			<td><?php echo $object_relation->term1 ?></td>
			<td><?php echo $object_relation->term2 ?> </td>
			<td><?php echo $object_relation->kode_term1 ?> </td>
			<td><?php echo $object_relation->kode_term2 ?></td>
			<td><?php echo $object_relation->keterangan ?></td>
		</tr>

		<?php } ?>

		
		</tbody>
		</table>
</body>
</html>