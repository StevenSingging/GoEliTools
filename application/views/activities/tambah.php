
<?php echo form_open(site_url('activities/tambah')) ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php if( empty($pengaturan) ){ ?>
<div class="form-group row">
  <label for="project_id" class="col-sm-3 text-right">Pilih Proyek</label>
  <div class="col-sm-9">
    <select name="project_id" class="form-control select2" required>
      <option value="">Pilih Proyek .....</option>
      <!-- Ambil data project dari Controller -->
      <?php foreach ($project as $project) { ?>
        <option value="<?php echo $project->project_id ?>">
         <?php echo $project->project_id ?> - <?php echo $project->project_name ?> 
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
        <option value="<?php echo $stakeholder->stakeholder_id ?>">
         <?php echo $stakeholder->stakeholder_id ?> - <?php echo $stakeholder->stakeholder_name ?> 
        </option>
      <?php } ?>
      }
    </select>
  </div>
</div>
<?php } elseif ($pengaturan && $pengaturan->project_id != null) { ?>
  <div class="form-group row">
    <label for="project_id" class="col-sm-3 text-right">Pilih Proyek</label>
    <div class="col-sm-9">
   
      <input type="text" name="project_id" class="form-control" value="<?php echo $pengaturan->project_id ?> - <?php echo $pengaturan->project_name ?>"  readonly>
      
   
    </div>
  </div>

  <div class="form-group row">
    <label for="stakeholder_id" class="col-sm-3 text-right">Pilih Stakeholder</label>
    <div class="col-sm-9">
      <input type="text" name="stakeholder_id" class="form-control" value="<?php echo $pengaturan->stakeholder_id ?> - <?php echo $pengaturan->stakeholder_name ?>"  readonly>
    </div>
  </div>
  
<?php }?>

<div class="form-group row">
  <label for="activities" class="col-sm-3 text-right">Pilih Aktifitas/Goal</label>
  <div class="col-sm-9">
    <div class="form-check col">
      <input class="form-check-input" type="radio" name="rdbtn" id="rdbtnact" checked>
      <label class="form-check-label mr-4" for="flexRadioAct">Aktifitas</label>
      <input class="form-check-input" type="radio" name="rdbtn" id="rdbtngoal">
      <label class="form-check-label" for="flexRadioGoal">Goal</label>
    </div>
  </div>
  <div class="col-sm-9">
    <div class="rads col-sm-9 text-right">
    </div>
  </div>
</div>

<div class="form-group row" id="rdbtnactive">
  <label for="parent_activities" class="col-sm-3 text-right"></label>
  <div class="col-sm-9 text-right">
      <select name="activities_id" class="form-control select2">
        <option value="0">Pilih Aktifitas ...</option>
        <?php  foreach ($activities as $activities) {  ?>
        <option value="<?php echo $activities->activities_id ?>">
          <?php echo $activities->activities_id ?> - <?php echo $activities->activities_desc ?>
        </option> <?php } ?>}
      </select>
  </div>
</div>

<div class="form-group row" id="rdbtngoals"> 
  <label for="goal_id" class="col-sm-3 text-right"></label>
  <div class="col-sm-9 text-right">
      <select name="goal_id" class="form-control select2" >
        <option value="">Pilih Goal ...</option>
        <!-- Ambil data Goal dari Controller -->
        <?php foreach ($goal as $goal) { ?>
          <option value="<?php echo $goal->goal_id ?>">
          <?php echo $goal->goal_id ?> - <?php echo $goal->goal_desc ?> 
          </option>
        <?php } ?>
        }
      </select>
  </div>
</div>

<div class="form-group row">
  <label for="activities" class="col-sm-3 text-right">Deskripsi Aktifitas</label>
  <div class="col-sm-9">
    <div class="input-group-append mb-2">
          <input type="text" name="activities_desc[]" class="form-control" placeholder="Deskripsi Aktifitas" required>
          <button style="width:100px" class="add_form_field btn btn-success btn-sm ml-1">Tambah +</button>
    </div>
    <div class="container1">

    </div>
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

<a href="<?php echo site_url('activities'); unset($_SESSION['sukses']); ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>
<script>
    $(document).ready(function () {
      $("#rdbtngoals").hide();
      $(".form-check-input").click(function() {
        if ($("#rdbtnact").is(":checked")) {
          $("#rdbtngoals").hide();
          $("#rdbtnactive").show();
        } else {
          $("#rdbtngoals").show();
          $("#rdbtnactive").hide();
        }
      });
    });

    $(document).ready(function () {
      var max_fields = 10;
      var wrapper = $(".container1");
      var add_button = $(".add_form_field");
      var x = 1;
      $(add_button).click(function(e) {
          e.preventDefault();
          if (x < max_fields) {
              x++;
              $(wrapper).append('<div class="input-group-append mb-2"><input type="text" name="activities_desc[]" class="form-control" placeholder="activities" required><button style="width:100px" class="delete btn btn-danger btn-sm ml-1">Hapus</button></div>'); //add input box
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
