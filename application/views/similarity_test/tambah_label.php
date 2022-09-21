
<?php echo form_open(site_url('similarity_test/lanjut_label/'.$sim_object->sim_id)) ?>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Description 1</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $sim_object->object_desc_1 ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="agent" class="col-sm-3 text-right">Description 2</label>
  <div class="col-sm-9">
    <textarea name="goal_desc" class="form-control" placeholder="goal"><?php echo $sim_object->object_desc_2 ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="sim_object" class="col-sm-3 text-right">Label Value</label>
  <div class="col-sm-9">
    <input type="text" name="label_sim" class="form-control" placeholder="label_sim" value="<?php echo set_value('label_sim') ?>" required>  
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

<a href="<?php echo site_url('similarity_test/label_sim_input') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>
<?php echo form_close(); ?>

