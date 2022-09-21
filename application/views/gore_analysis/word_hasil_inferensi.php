<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - status goal inferensi';
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
	<h3> LIST OF GOAL STATUS </h3>
		<hr>
			
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">PARENT CODE</th>
			<th width = "25%">PARENT DESCRIPTION</th>
			<th width = "25%">CHILD CODE </th>
			<th width = "10%">PARENT VALUE </th>
		</tr>
		</thead>
		
		<tbody>
		<?php  foreach ($hasilinferensi as $key => $hasilinferensi) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $hasilinferensi->parent_code ?></td>
			<td><?php echo $hasilinferensi->parent_desc ?></td>
			<td><?php echo $hasilinferensi->child_code ?></td>
			<td><?php echo $hasilinferensi->fact_value ?></td>
		</tr>

		<?php } ?>
		
		</tbody>
		</table>
</body>
</html>