<?php
// open form
//echo form_open(base_url('project',' class="form-horizontal"'));
echo form_open(site_url('pengaturan'));
?>

<div class="form-group row">
  <label for="project_id" class="col-sm-3 text-right">Pilih Project</label>
  <div class="col-sm-9">
    <select name="project_id" class="form-control select2" required>
      <option value="">Pilih Project .....</option>
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


<div class="form-group row">
  <label for="goal" class="col-sm-3 text-right"></label>
  <div class="col-sm-9">
    <button type="btn btn-success" type="submit" name="submit" value="submit">
      <i class="fa fa-save"></i> Simpan Data
    </button>
    <button type="btn btn-default" type="reset" name="reset" value="reset">
      <i class="fa fa-times"></i> Reset
    </button>
    
  </div>
</div>
<?php if( $pengaturan ) {?>
<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "30%">PROJECT</th>
			<th width = "30%">STAKEHOLDER</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pengaturan1 as $key => $pengaturan1) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
      <td><?php echo $pengaturan1->project_name ?></td>
			<td><?php echo $pengaturan1->stakeholder_name ?></td>
      <td>
      <a href="<?php echo site_url('pengaturan/delete/'.$pengaturan1->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> Hapus
					</a>
      </td>
		</tr>

		<?php } ?>

	</tbody>
</table>
<?php }?>
<a href="<?php echo site_url('dashboard') ?>" class="btn btn-success">
        <i class = "fa fa-backward"></i> Kembali
</a>
<?php echo form_close(); ?>