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
		<h1> CETAK DAFTAR PROCEDURE ACTIVITIES </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
			  <tr>
			<th width="25%">ACTIVITIES ID - DESCRIPTION</th>
			<th> : <?php echo $activities->activities_id ?> - <?php echo $activities->activities_desc ?></th>
			  </tr>
		    </thead>
		</table>

		<hr>
		<h3>DAFTAR PROSEDUR AKTIFITAS</h3>
		<hr>
		
		<table class="table table-bordered table striped table-sm" id="example1">
		
		<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "5%">PROCEDURE ID</th>
			<th width = "30%">PROCEDURE DESCRIPTION</th>
			<th width = "20%">ACTIVITIES ID & DESC</th>
			<th width = "15%">PROCEDURE ACTOR-RESOURCES</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($procedure as $key => $procedure) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $procedure->procedure_id ?> </td>
			<td><?php echo $procedure->procedure_desc ?> </td>

			<td><?php echo $procedure->activities_id ?>- <?php echo $procedure->activities_desc ?>
			</td>

			<td><?php echo $procedure->actor ?> - <?php echo $procedure->resources ?> </td>
		</tr>

		<?php } ?>

		</tbody>
		</table>
	
	</div>
</body>
</html>