<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title?></title>
	<!-- panggil css print -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print.css') ?> " media="screen">
	<!-- media print -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/print.css') ?> " media="print">
	
</head>
<body onload="print()">
	<div class="cetak">
		<h1> CETAK DATA PROCEDURE DETAIL </h1>
		<hr>
		<table class ="table table-striped">
		
		<thead>
		<tr>
			<td width="25%">Procedure detail ID</td>
			<td> : <?php echo $procedure_detail->procedure_detail_id ?></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Procedure ID</td>
			<td>: <?php echo $procedure_detail->procedure_id?></td>
		</tr>
		<tr>
			<td>Procedure Description</td>
			<td>: <?php echo $procedure->procedure_desc ?></td>
		</tr>
		<tr>
			<td>Procedure detail No</td>
			<td>: <?php echo $procedure_detail->procedure_detail_no ?></td>
		</tr>
		<tr>
			<td>Procedure detail Description</td>
			<td>: <?php echo $procedure_detail->procedure_detail_desc ?></td>
		</tr>
		<tr>
			<td>Pre-Condition</td>
			<td>: <?php echo $procedure_detail->pre_condition?></td>
		</tr>
		<tr>
			<td>Post-Condition</td>
			<td>: <?php echo $procedure_detail->post_condition?></td>
		</tr>
		<tr>
			<td>Formula/Rumus</td>
			<td>: <?php echo $procedure_detail->formula?></td>
		</tr>
		<tr>
			<td>Procedure_detail Actor</td>
			<td>: <?php echo $procedure_detail->actor ?></td>
		</tr>
		<tr>
			<td>Procedure_detail Resources</td>
			<td>: <?php echo $procedure_detail->resources ?></td>
		</tr>
	</tbody>
	
	</div>
</body>
</html>