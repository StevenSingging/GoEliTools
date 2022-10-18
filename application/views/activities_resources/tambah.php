
<?php echo form_open(site_url('activities_resources/tambah')) ?>

<div class="form-group row">
  <label for="activities_id" class="col-sm-3 text-right">Pilih Aktivitas</label>
  <div class="col-sm-9">
    <select name="activities_id" class="form-control select2" required>
      <option value="">Pilih Aktifitas .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($activities as $activities) { ?>
        <option value="<?php echo $activities->activities_id ?>">
         <?php echo $activities->activities_id ?> - <?php echo $activities->activities_desc ?>
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="actor" class="col-sm-3 text-right">Actor</label>
  <div class="col-sm-9">
    <input type="text" name="actor" class="form-control" placeholder="actor" value="<?php echo set_value('actor') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="resourcse" class="col-sm-3 text-right">Resources</label>
  <div class="col-sm-9">
    <input type="text" name="resources" class="form-control" placeholder="activities" value="<?php echo set_value('resources') ?>" required>
  </div>
</div>

<div class="form-group row">
  <label for="activities" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan Data
     </button>
    <button type="reset" class="btn btn-info">
                <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<a href="<?php echo site_url('activities_resources') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>
<?php echo form_close(); ?>