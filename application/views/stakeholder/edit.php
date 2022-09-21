<?php
// form edit open
echo form_open(site_url('stakeholder/edit/'.$stakeholder->stakeholder_id));
?>
<div class="form-group row">
  <label for="stakeholder_name" class="col-sm-3 col-form-label">Stakeholder Name</label>
  <div class="col-sm-9">
    <input type="text" name="stakeholder_name" class="form-control" placeholder="Stakeholder Name" value="<?php echo $stakeholder->stakeholder_name ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="stakeholder_type" class="col-sm-3 col-form-label">Stakeholder Type</label>
  <div class="col-sm-9">
    <select name="stakeholder_type" class="form_control" value = "<?php echo $stakeholder->stakeholder_type ?>">
      <option value="Pegawai">Pegawai</option>
      <option value="Pimpinan">Pimpinan</option>
      <option value="Analis">Analis</option>
      <option value="Pengguna">Pengguna</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="stakeholder_competence" class="col-sm-3 col-form-label">Stakeholder Competence</label>
  <div class="col-sm-9">
    <input type="text" name="stakeholder_competence" class="form-control" placeholder="Stakeholder Competence" value="<?php echo $stakeholder->stakeholder_competence ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="ok" class="col-sm-3 col-form-label"></label>
  <div class="col-sm-9">
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="reset" class="btn btn-info">
      <i class="fa fa-times"></i> Reset
    </button>
    <a href="<?php echo site_url('stakeholder') ?>" class="btn btn-default">
     <i class="fa fa-backward"></i> Kembali
   </a>
 </div>
</div>
<?php
//form close
echo form_close();
?>