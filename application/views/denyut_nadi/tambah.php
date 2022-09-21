
<?php echo form_open(site_url('denyut_nadi/tambah')) ?>

<div class="form-group row">
  <label for="id_pasien" class="col-sm-3 text-right">Pilih Pasien</label>
  <div class="col-sm-9">
    <select name="id_pasien" class="form-control select2" required>
      <option value="">Pilih Pasien .....</option>
      <!-- Ambil data pasien dari Controller -->
      <?php foreach ($pasien as $pasien) { ?>
        <option value="<?php echo $pasien->id_pasien ?>">
         <?php echo $pasien->kode_pasien ?> - <?php echo $pasien->nama_pasien ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="denyut_nadi" class="col-sm-3 text-right">Tanggal dan waktu pengukuran</label>
  <div class="col-sm-3">
    <input type="text" name="tanggal_pengukuran" class="form-control tanggal" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_pengukuran') ?>" required>
  </div>
  <div class="col-sm-3">
    <input type="text" name="jam_pengukuran" class="form-control" placeholder="jj:mm" value="<?php echo set_value('jam_pengukuran') ?>" required> 
    <small>Misal: <?php echo date('H:i') ?></small>
  </div>
</div>

<div class="form-group row">
  <label for="denyut_nadi" class="col-sm-3 text-right">Tekanan Darah (TDS &amp; TDD)</label>
  <div class="col-sm-3">
    <input type="text" name="tds" class="form-control" placeholder="TDS" value="<?php echo set_value('tds') ?>" required>
  </div>
  <div class="col-sm-3">
    <input type="text" name="tdd" class="form-control" placeholder="TDD" value="<?php echo set_value('tdd') ?>" required> 
  </div>
</div>

<div class="form-group row">
  <label for="denyut_nadi" class="col-sm-3 text-right">Denyut Nadi</label>
  <div class="col-sm-9">
    <input type="text" name="denyut_nadi" class="form-control" placeholder="Denyut Nadi" value="<?php echo set_value('denyut_nadi') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="denyut_nadi" class="col-sm-3 text-right">Keterangan lain</label>
  <div class="col-sm-9">
    <textarea name="keterangan" class="form-control" placeholder="keterangan lain"><?php echo set_value('keterangan') ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="denyut_nadi" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>


<?php echo form_close(); ?>