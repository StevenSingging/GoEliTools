<p class="text-right">
	<a href ="<?php echo site_url('pasien/edit/' .$pasien->id_pasien) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Pasien
	</a>

	<a href ="<?php echo site_url('pasien/cetak/' .$pasien->id_pasien) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('pasien') ?>" class = "btn btn-info">
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
			<td>: <?php echo $pasien->nama_pasien ?></td>
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

