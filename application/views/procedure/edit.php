
<?php echo form_open(site_url('procedure/edit/'.$procedure->procedure_id)) ?>

<div class="form-group row">
  <label for="project_id" class="col-sm-3 text-right">Pilih Project</label>
  <div class="col-sm-9">
    <select name="project_id" class="form-control select2" required>
      <option value="">Pilih Project .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($project as $project) { ?>
        <option value="<?php echo $project->project_id ?>"
         <?php if($project->project_id==$procedure->project_id) {echo 'selected';} ?>> <?php echo $project->project_id ?> - <?php echo $project->project_name ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="stakeholder_id" class="col-sm-3 text-right">Pilih Stakeholder</label>
  <div class="col-sm-9">
    <select name="stakeholder_id" class="form-control select2" required>
      <option value="">Pilih Stakeholder .....</option>
      <!-- Ambil data stakeholder dari Controller -->
      <?php foreach ($stakeholder as $stakeholder) { ?>
        <option value="<?php echo $stakeholder->stakeholder_id ?>"
         <?php if($stakeholder->stakeholder_id==$procedure->stakeholder_id) {echo 'selected';} ?>>
         <?php echo $stakeholder->stakeholder_id ?> - <?php echo $stakeholder->stakeholder_name ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="procedure" class="col-sm-3 text-right">Procedure Description</label>
  <div class="col-sm-9">
    <textarea name="procedure_desc" class="form-control" placeholder="procedure"><?php echo $procedure->procedure_desc ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="activities" class="col-sm-3 text-right">Activities ID</label>
  <div class="col-sm-9">
    <select name="activities_id" class="form-control select2" >
      <option value=""><?php echo $procedure->activities_id ?></option>
      <!-- Ambil data activities dari Controller -->
      <?php  foreach ($activities as $activities) {  ?>
        <option value="<?php echo $activities->activities_id ?>"
          <?php if($activities->activities_id==$procedure->activities_id) {echo 'selected';} ?>>
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
    <textarea name="actor" class="form-control" placeholder="actor"><?php echo $procedure->actor ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="resources" class="col-sm-3 text-right">Resources</label>
  <div class="col-sm-9">
    <textarea name="resources" class="form-control" placeholder="resources"><?php echo $procedure->resources ?>
  </textarea>
  </div>
</div>



<div class="form-group row">
  <label for="procedure" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<a href="<?php echo site_url('procedure') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>

<?php echo form_close(); ?>