<?php echo form_open(site_url('procedure_detail/tambah')) ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="form-group row">
  <label for="procedure_id" class="col-sm-3 text-right">Pilih procedure</label>
  <div class="col-sm-9">
    <select name="procedure_id" class="form-control select2" required>
      <option value="">Pilih Procedure .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($procedure as $procedure) { ?>
        <option value="<?php echo $procedure->procedure_id ?>">
         <?php echo $procedure->procedure_id ?> - <?php echo $procedure->procedure_desc ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="formula" class="col-sm-3 text-right">Formula</label>
  <div class="col-sm-9">
    <input type="text" name="formula" class="form-control" placeholder="formula" value="<?php echo set_value('formula') ?>">
  </div>
</div>

<div class="form-group row">
  <label for="actor" class="col-sm-3 text-right">Actor</label>
  <div class="col-sm-9">
    <input type="text" name="actor" class="form-control" placeholder="actor" value="<?php echo set_value('actor') ?>" >
  </div>
</div>

<div class="form-group row">
  <label for="resources" class="col-sm-3 text-right">resources</label>
  <div class="col-sm-9">
    <input type="text" name="resources" class="form-control" placeholder="resources" value="<?php echo set_value('resources') ?>" >
  </div>
</div>

<div class="text-right">
<div class="form-group row">
  <label for="form1" class="col-sm-5 text-right">Procedure Detail 1</label>
</div>
<div class="form-group row">
  <label for="procedure_detail" class="col-sm-3 text-right">Procedure_detail Description</label>
  <div class="col-sm-9">
    <input type="text" name="procedure_detail_desc[]" class="form-control" placeholder="procedure_detail" required>
  </div>
</div>
<div class="form-group row">
  <label for="pre_condition" class="col-sm-3 text-right">Procedure Pre-Condition</label>
  <div class="col-sm-9">
    <input type="text" name="pre_condition[]" class="form-control" placeholder="procedure_detail" required>
  </div>
</div>
<div class="form-group row">
  <label for="post_condition" class="col-sm-3 text-right">Procedure Post-Condition</label>
  <div class="col-sm-9">
    <input type="text" name="post_condition[]" class="form-control" placeholder="post_procedure" required>
  </div>
</div>
  <button style="width:100px" class="add_form_field btn btn-success btn-sm ml-auto mr-2">Add +</button>
<div class="container1 mt-2">

</div>
</div>

<div class="form-group row">
  <label for="procedure_detail" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
    
  </div>
</div>

<a href="<?php echo site_url('procedure_detail') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>

<script>
    $(document).ready(function () {
      var max_fields = 10;
      var wrapper = $(".container1");
      var add_button = $(".add_form_field");
      var x = 1;

      $(add_button).click(function(e) {
          e.preventDefault();
          if (x < max_fields) {
              x++;
              $(wrapper).append('<div class="text-right"><div class="form-group row"><label for="form1" class="col-sm-5 text-right">Procedure Detail '+x+'</label></div><div class="form-group row"><label for="procedure_detail_desc" class="col-sm-3 text-right">Procedure_detail Description</label><div class="col-sm-9"><input type="text" name="procedure_detail_desc[]" class="form-control" placeholder="procedure_detail" required></div></div><div class="form-group row"><label for="pre_condition" class="col-sm-3 text-right">Procedure Pre-Condition</label><div class="col-sm-9"><input type="text" name="pre_condition[]" class="form-control" placeholder="procedure_detail" required></div></div><div class="form-group row"><label for="post_condition[]" class="col-sm-3 text-right">Procedure Post-Condition</label><div class="col-sm-9"><input type="text" name="post_condition[]" class="form-control" placeholder="post_procedure" required></div></div><button style="width:100px" class="delete btn btn-danger btn-sm ml-auto mr-2">Delete</button></div>'); //add input box
          } else {
              alert('You Reached the limits')
          }
      });

      $(wrapper).on("click", ".delete", function(e) {
          e.preventDefault();
          $(this).parent('div').remove();
          x--;
      })
    });
</script>

<?php echo form_close(); ?>