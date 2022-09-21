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
			<th width = "30%">PROCEDURE DETAIL DESCRIPTION</th>
			<th width = "10%">PRE CONDITION</th>
			<th width = "10%">POST CONDITION</th>
			<th width = "10%">FORMULA</th>
			<th width = "10%">ACTOR-RESOURCES</th>
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
			<td><?php echo $procedure_detail->actor ?>-<?php echo $procedure_detail->resources ?> </td>
		</tr>

		<?php } ?>

	</tbody>
</table>
	
	</div>
</body>
</html>