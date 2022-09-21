
<?php echo form_open(site_url('activities_resources/edit/'.$activities_resources->id)) ?>

<div class="form-group row">
  <label for="activities_id" class="col-sm-3 text-right">Pilih Aktivitas</label>
  <div class="col-sm-9">
    <select name="activities_id" class="form-control select2" required>
      <option value="">Pilih Aktifitas .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($activities as $activities) { ?>
        <option value="<?php echo $activities->activities_id ?>"
          <?php if($activities->activities_id==$activities_resources->activities_id) {echo 'selected';} ?>>
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
    <textarea name="actor" class="form-control" placeholder="actor"><?php echo $activities_resources->actor ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="resourcse" class="col-sm-3 text-right">Resources</label>
  <div class="col-sm-9">
    <textarea name="resources" class="form-control" placeholder="resources"><?php echo $activities_resources->resources ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="activities_resources" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<a href="<?php echo site_url('activities_resources') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>

<?php echo form_close(); ?>