<?php
// open form
//echo form_open(base_url('pasien',' class="form-horizontal"'));
echo form_open(site_url('pasien'));
?>

<p>
	<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-default">
            <i class= "fa fa-plus"> </i> Tambah Pasien Baru
    </button>
</p>
<?php
// panggil form tambah
include('tambah.php');
//closing form
echo form_close();
?>

<table class="table table-bordered table striped table-sm" id="example1">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">KODE</th>
			<th width = "25%">NAMA</th>
			<th width = "10%">TELEPON</th>
			<th width = "5%">L/P</th>
			<th width = "20%">TTL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pasien as $key => $pasien) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $pasien->kode_pasien ?></td>
			<td><?php echo $pasien->nama_pasien ?>
				<br><small><?php echo $pasien->alamat ?></small>
			</td>
			<td><?php echo $pasien->telepon ?></td>
			<td><?php echo $pasien->jenis_kelamin ?></td>
			<td><?php echo $pasien->tempat_lahir ?>, <?php echo date('d-m-Y', strtotime($pasien->tanggal_lahir)) ?></td>
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('pasien/detail/'.$pasien->id_pasien) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> Detail
					</a>
					
					<a href="<?php echo site_url('pasien/cetak/'.$pasien->id_pasien) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> Cetak
					</a>

					<a href="<?php echo site_url('pasien/edit/'.$pasien->id_pasien) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> Edit
					</a>
					
					<a href="<?php echo site_url('pasien/delete/'.$pasien->id_pasien) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> Hapus
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>