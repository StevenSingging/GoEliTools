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
		<h1> CETAK RIWAYAT SUHU TUBUH PASIEN </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
				<tr>
					<td>Nama Pasien</td>
					<th> : <?php echo $pasien->nama_pasien ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Kode Pasien</td>
					<td>: <?php echo $pasien->kode_pasien ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin </td>
					<td>: <?php echo $pasien->jenis_kelamin ?></td>
				</tr>
				<tr>
					<td>Tempat, tanggal lahir</td>
					<td>: <?php echo $pasien->tempat_lahir ?><?php echo date('d-m-Y', strtotime($pasien->tanggal_lahir)) ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <?php echo $pasien->alamat ?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>: <?php echo $pasien->telepon ?></td>
				</tr>
				<tr>
					<td>tanggal update</td>
					<td>: <?php echo $pasien->tanggal_update ?></td>
				</tr>

			</tbody>
		</table>

		<hr>
		<h3>DATA RIWAYAT SUHU TUBUH</h3>
		<hr>
		
		<table class="table table-bordered table striped table-sm" id="example1">
			<thead>
				<tr>
					<th width = "5%">NO</th>
					<th width = "25%">KODE - PASIEN</th>
					<th width = "10%">SUHU</th>
					<th width = "15%">WAKTU</th>
					<th width = "15%">METODE</th>
					<th width = "15%">OLEH</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($project_stakeholder as $key => $project_stakeholder) { ?> 

					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $project_stakeholder->kode_pasien ?>- <?php echo $project_stakeholder->nama_pasien ?>
						</td>
						<td class="<?php if($project_stakeholder->project_stakeholder <=37) {echo 'bg-success';}elseif($project_stakeholder->project_stakeholder <=38) {echo 'bg-warning';}else{echo 'bg-danger';} ?>"><?php echo $project_stakeholder->project_stakeholder ?> Derajat</td>
						<td><?php echo date('d-m-Y', strtotime($project_stakeholder->tanggal_pengukuran)) ?> jam <?php echo date('H:i', strtotime($project_stakeholder->jam_pengukuran)) ?></td>
						<td><?php echo $project_stakeholder->metode_pengukuran ?></td>
						<td><?php echo $project_stakeholder->nama_user ?></td>
					</tr>

					<?php } ?>

				</tbody>
			</table>
	
	</div>
</body>
</html>