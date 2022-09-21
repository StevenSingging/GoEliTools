<?php
// open form
echo form_open(site_url('pasien/tambah'));
?>

<div class="form-group row">
  <label for="kode_pasien" class="col-sm-3 col-form-label">Kode Pasien</label>
  <div class="col-sm-9">
    <input type="text" name="kode_pasien" class="form-control" placeholder="Kode Pasien" value="<?php echo set_value('kode_pasien') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Pasien</label>
  <div class="col-sm-9">
    <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" value="<?php echo set_value('nama_pasien') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
  <div class="col-sm-9">
    <select name="jenis_kelamin" class="form_control">
      <option value="P">Perempuan</option>
      <option value="L">Laki-laki</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
  <div class="col-sm-9">
    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
  <div class="col-sm-9">
    <input type="text" name="tanggal_lahir" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_lahir') ?>" >
  </div>
</div>

<div class="form-group row">
  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
  <div class="col-sm-9">
    <input name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="telepon" class="col-sm-3 col-form-label">Telepon/HP</label>
  <div class="col-sm-9">
    <input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="<?php echo set_value('telepon') ?>">
  </div>
</div>

<div class="form-group row">
  <label for="telepon" class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
   	<button type="submit" name=submit class="btn btn-success btn-lg">
                <i class="fa fa-save"></i> Simpan Data Pasien
     </button>
     <a href="<?php echo site_url('pasien') ?>" class="btn btn-info btn_lg">
      	<i class="fa fa-backward"></i> Kembali
      </a>
  </div>
</div>

<?php// form buka
echo form_close();
?>