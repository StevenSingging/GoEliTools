
<?php echo form_open(site_url('goal/edit/'.$goal->goal_id)) ?>

<div class="form-group row">
  <label for="project_id" class="col-sm-3 text-right">Pilih Project</label>
  <div class="col-sm-9">
    <select name="project_id" class="form-control select2" required>
      <option value="">Pilih Project .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($project as $project) { ?>
        <option value="<?php echo $project->project_id ?>"
         <?php if($project->project_id==$goal->project_id) {echo 'selected';} ?>> <?php echo $project->project_id ?> - <?php echo $project->project_name ?> 
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
         <?php if($stakeholder->stakeholder_id == $goal->stakeholder_id) {echo 'selected';} ?>>
         <?php echo $stakeholder->stakeholder_id ?> - <?php echo $stakeholder->stakeholder_name ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div> 

<div class="form-group row">
  <label for="goal" class="col-sm-3 text-right">Goal/Fitur Description</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $goal->goal_desc ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="goal" class="col-sm-3 text-right">Goal/Fitur Type</label>
  <div class="col-sm-9">
    <select name="goal_type" class="form control">
      <option value="hard">Hard Goal</option>
      <option value="soft"<?php if($goal ->goal_type=='soft') {echo 'selected';} ?>>Soft Goal</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="parent_goal" class="col-sm-3 text-right">Parent Goal</label>
  <div class="col-sm-9">
    <select name="p_goal_id" class="form-control select2" >
      <!-- Ambil data goal dari Controller -->
      <?php  foreach ($goal2 as $goal2) {  ?>
        <option value="<?php echo $goal2->goal_id ?>" <?php if($goal2->goal_id==$goal->parent_goal_id){echo "selected";} ?>>
          <?php echo $goal2->goal_id ?> - <?php echo $goal2->goal_desc ?>
        </option> 
      <?php } ?>
      }
    </select>
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

<a href="<?php echo site_url('goal') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>

<?php echo form_close(); ?>