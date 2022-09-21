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
		<h1> CETAK SUMBER DAYA AKTIVITAS </h1>
		<hr>
		<table class ="table table-striped">
		
		<tr>
			<th width="25%">ID</th>
			<th> : <?php echo $activities_resources->id ?></th>
		</tr>
		<tr>
			<th width="25%">Activities ID</th>
			<th> : <?php echo $activities_resources->activities_id ?> - 
					<?php echo $activities->activities_desc ?></th>
		</tr>
		<tr>
			<th width="15%">Actor</th>
			<th> : <?php echo $activities_resources->actor ?></th>
		</tr>
		<tr>
			<th width="25%">Resources</th>
			<th> : <?php echo $activities_resources->resources ?></th>
		</tr>
	
	</div>
</body>
</html>