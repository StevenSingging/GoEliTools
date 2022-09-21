
<?php echo form_open(site_url('gore_analysis/tambah_behavior')) ?>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Child Code</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $agentbehavior->child_code ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Child Description</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $agentbehavior->child_desc ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Pre Condition</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $agentbehavior->pre_condition ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Pre Condition Value</label>
  <div class="col-sm-9">
    <select name="pre_value" class="form control">
      <option value="Y">Ya</option>
      <option value="T">Tidak</option>
    </select>
  </div>
</div>


<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Post Condition</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $agentbehavior->post_condition ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Post Condition Value</label>
  <div class="col-sm-9">
    <select name="post_value" class="form control">
      <option value="Y">Ya</option>
      <option value="T">Tidak</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
    
  </div>
</div>

<a href="<?php echo site_url('gore_analysis') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>
<?php echo form_close(); ?>

