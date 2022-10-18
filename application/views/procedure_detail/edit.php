
<?php echo form_open(site_url('procedure_detail/edit/'.$procedure_detail->procedure_detail_id)) ?>

<!-- <div class="form-group row">
  <label for="procedure_id" class="col-sm-3 text-right">Pilih procedure</label>
  <div class="col-sm-9">
     <textarea name="procedure_id" class="form-control" placeholder="procedure_id"><?php echo $procedure_detail->procedure_id ?>
  </textarea>
  </div>
</div>

<div class="form-group row">
  <label for="procedure_detail_no" class="col-sm-3 text-right">Procedure_detail_No</label>
  <div class="col-sm-9">
    <textarea name="procedure_detail_no" class="form-control" placeholder="procedure_detail"><?php echo $procedure_detail->procedure_detail_no ?></textarea>
  </div>
</div> -->


<div class="form-group row">
  <label for="procedure_detail" class="col-sm-3 text-right">Procedure_detail Description</label>
  <div class="col-sm-9">
    <textarea name="procedure_detail_desc" class="form-control" placeholder="procedure_detail_desc"><?php echo $procedure_detail->procedure_detail_desc ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="pre_condition" class="col-sm-3 text-right">Procedure Pre-Condition</label>
  <div class="col-sm-9">
    <textarea type="text" name="pre_condition" class="form-control" placeholder="procedure_detail"> <?php echo $procedure_detail->pre_condition ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="post_condition" class="col-sm-3 text-right">Procedure Post-Condition</label>
  <div class="col-sm-9">
    <textarea type="text" name="post_condition" class="form-control" placeholder="post_procedure"> <?php echo $procedure_detail->post_condition ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="formula" class="col-sm-3 text-right">Formula</label>
  <div class="col-sm-9">
    <textarea type="text" name="formula" class="form-control" placeholder="formula"> <?php echo $procedure_detail->formula ?></textarea>
  </div>
</div>


<div class="form-group row">
  <label for="actor" class="col-sm-3 text-right">Actor</label>
  <div class="col-sm-9">
    <textarea type="text" name="actor" class="form-control" placeholder="actor"> <?php echo $procedure_detail->actor ?></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="resources" class="col-sm-3 text-right">resources</label>
  <div class="col-sm-9">
    <textarea type="text" name="resources" class="form-control" placeholder="resources"> <?php echo $procedure_detail->resources ?></textarea>
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

<a href="<?php echo site_url('procedure_detail') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>

<?php echo form_close(); ?>