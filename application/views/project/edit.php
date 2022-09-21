<?php
// form edit open
echo form_open(site_url('project/edit/'.$project->project_id));
?>
<div class="form-group row">
  <label for="project_name" class="col-sm-3 col-form-label">Project Name</label>
  <div class="col-sm-9">
    <input type="text" name="project_name" class="form-control" placeholder="Project Name" value="<?php echo $project->project_name ?>" required>
  </div>
</div>


<div class="form-group row">
  <label for="project_desc" class="col-sm-3 col-form-label">Project Description</label>
  <div class="col-sm-9">
    <input type="text" name="project_desc" class="form-control" placeholder="Project Description" value="<?php echo $project->project_desc ?>" required>
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
    <a href="<?php echo site_url('project') ?>" class="btn btn-default">
     <i class="fa fa-backward"></i> Kembali
   </a>
 </div>
</div>
<?php
//form close
echo form_close();
?>