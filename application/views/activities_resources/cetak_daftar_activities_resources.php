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
		<h1> CETAK DAFTAR SUMBER DAYA AKTIFITAS </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
			  <tr>
				<th width="25%">Activities ID - Description</th>
				<th> : <?php echo $activities->activities_id ?> - 
						<?php echo $activities->activities_desc ?></th>
			  </tr>
		    </thead>
		</table>

		<hr>
		<h3>DAFTAR GOAL PROJECT</h3>
		<hr>
		
		<table class="table table-bordered table striped table-sm" id="example1">
			<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "15%">ACTOR</th>
			<th width = "30%">RESOURCES</th>
			</tr>
	</thead>
	<tbody>
		<?php foreach ($activities_resources as $key => $activities_resources) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $activities_resources->actor ?> </td>
			<td><?php echo $activities_resources->resources ?> </td>
		</tr>

		<?php } ?>

	</tbody>
	</table>
	
	</div>
</body>
</html>