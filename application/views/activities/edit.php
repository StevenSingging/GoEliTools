
<?php echo form_open(site_url('activities/edit/'.$activities->activities_id)) ?>

<div class="form-group row">
  <label for="project_id" class="col-sm-3 text-right">Pilih Project</label>
  <div class="col-sm-9">
    <select name="project_id" class="form-control select2" required>
      <option value="">Pilih Project .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($project as $project) { ?>
        <option value="<?php echo $project->project_id ?>"
         <?php if($project->project_id==$activities->project_id) {echo 'selected';} ?>> <?php echo $project->project_id ?> - <?php echo $project->project_name ?> 
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
         <?php if($stakeholder->stakeholder_id==$activities->stakeholder_id) {echo 'selected';} ?>>
         <?php echo $stakeholder->stakeholder_id ?> - <?php echo $stakeholder->stakeholder_name ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="activities" class="col-sm-3 text-right">Activities Description</label>
  <div class="col-sm-9">
    <textarea name="activities_desc" class="form-control" placeholder="activities"><?php echo $activities->activities_desc ?>
  </textarea>
  </div>
</div>


<div class="form-group row">
  <label for="parent_activities" class="col-sm-3 text-right">Parent Activities</label>
  <div class="col-sm-9">
    <select name="activities_id" class="form-control select2" >
      <option value=""><?php echo $activities->parent_activities_id ?></option>
      <!-- Ambil data activities dari Controller -->
      <?php  foreach ($activities2 as $activities2) {  ?>
        <option value="<?php echo $activities2->activities_id?>"
          <?php if($activities2->activities_id==$activities->parent_activities_id) {echo 'selected';} ?>> 
          <?php echo $activities2->activities_id ?> - <?php echo $activities2->activities_desc ?>
        </option> 
      <?php } ?>
      }
    </select>
  </div>
</div>

 
<div class="form-group row">
  <label for="goal_id" class="col-sm-3 text-right">Pilih goal</label>
  <div class="col-sm-9">
    <select name="goal_id" class="form-control select2" >
      <option value="">Pilih goal...</option>
      <!-- Ambil data goal dari Controller -->
      <?php foreach ($goal as $goal) { ?>
        <option value="<?php echo $goal->goal_id ?>"
         <?php if($goal->goal_id==$activities->goal_id) {echo 'selected';} ?>>
         <?php echo $goal->goal_id ?> - <?php echo $goal->goal_desc ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="activities" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
  </div>
</div>

<a href="<?php echo site_url('activities') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>

<?php echo form_close(); ?>