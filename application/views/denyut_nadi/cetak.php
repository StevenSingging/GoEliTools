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
		<h1> CETAK DATA SUHU TUBUH PASIEN </h1>
		<hr>
		<table class ="table table-striped">
			<thead>
				<tr>
					<th>Nama Pasien</th>
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
		<h3>DATA TEKANAN DARAH (TDS, TDD DAN DENYUT NADI)</h3>
		<hr>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<td width="25%">Waktu Pengukuran</td>
					<td>: <?php echo date('d-m-Y',strtotime($denyut_nadi->tanggal_pengukuran)) ?> jam <?php echo $denyut_nadi->jam_pengukuran ?></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>TDS/TDD</td>
					<td>: <?php echo $denyut_nadi->tds ?>/<?php echo $denyut_nadi->tdd ?></td>
				</tr>
				<tr>
					<td>Denyut Nadi</td>
					<td>: <?php echo $denyut_nadi->denyut_nadi ?></td>
				</tr>

				<tr>
					<td>Keterangan Lain</td>
					<td>: <?php echo $denyut_nadi->keterangan ?></td>
				</tr>
			</tbody>
		</table>


	
	</div>
</body>
</html>