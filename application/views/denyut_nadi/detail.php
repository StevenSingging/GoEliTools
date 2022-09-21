<p class="text-right">
	<a href ="<?php echo site_url('denyut_nadi/edit/' .$denyut_nadi->id_denyut_nadi) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Denyut Nadi
	</a>

	<a href ="<?php echo site_url('denyut_nadi/cetak/' .$denyut_nadi->id_denyut_nadi) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('denyut_nadi') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Nama Pasien</th>
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
			<th width="25%">Waktu Pengukuran</th>
			<th>: <?php echo date('d-m-Y',strtotime($denyut_nadi->tanggal_pengukuran)) ?> jam <?php echo $denyut_nadi->jam_pengukuran ?></th>
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
