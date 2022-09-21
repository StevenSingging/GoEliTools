<?php
// untuk mengenerate menjadi file word
$nama_file = 'Laporan - Data Detail Per-Procedure';
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
			padding: 6px 10px;
			text-align: left;
			vertical-align: top;
			border:  solid thin #666;
		}
		
	</style>
</head>
<body>
	<h1> CETAK DETAIL PROCEDURE </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
			  <tr>
				<th>Procedure ID - Description</th>
				<th> : <?php echo $procedure->procedure_id ?>--<?php echo $procedure->procedure_desc ?></th>
			  </tr>
		    </thead>
		</table>

		<hr>
		<h3>DAFTAR DETAIL PROCEDURE</h3>
		<hr>
		
		<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "5%">ID</th>
			<th width = "10%">PROCEDURE DETAIL NO</th>
			<th width = "20%">PROCEDURE DETAIL DESCRIPTION</th>
			<th width = "10%">PRE CONDITION</th>
			<th width = "10%">POST CONDITION</th>
			<th width = "10%">FORMULA</th>
			<th width = "10%">ACTOR</th>
			<th width = "10%">RESOURCES</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($procedure_detail as $key => $procedure_detail) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $procedure_detail->procedure_detail_id ?> </td>
			<td><?php echo $procedure_detail->procedure_detail_no ?> </td>
			<td><?php echo $procedure_detail->procedure_detail_desc ?> </td>
			<td><?php echo $procedure_detail->pre_condition ?> </td>
			<td><?php echo $procedure_detail->post_condition ?> </td>
			<td><?php echo $procedure_detail->formula ?> </td>
			<td><?php echo $procedure_detail->actor ?> </td>
			<td><?php echo $procedure_detail->resources ?> </td>
		</tr>

		<?php } ?>

	</tbody>
</table>
	
</body>
</html>