<?php
// open form
//echo form_open(base_url('project',' class="form-horizontal"'));
echo form_open(site_url('project'));
?>

<p>
	<button type="button"  class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-default">
            <i class= "fa fa-plus"> </i> Tambah Project Baru
    </button>
    <a href ="<?php echo site_url('project/cetak_seluruh/') ?>" class = "btn btn-success btn-lg" target="_blank">
		<i class="fa fa-print"></i> Cetak Seluruh Data Project</a>
</p>

<?php
// panggil form tambah
//include('cetak_seluruh.php');
include('tambah.php');
//closing form
echo form_close();
?>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">PROJECT ID</th>
			<th width = "25%">PROJECT NAME</th>
			<th width = "35%">PROJECT DESCRIPTION</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($project as $key => $project) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $project->project_id ?></td>
			<td><?php echo $project->project_name ?> </td>
			<td><?php echo $project->project_desc ?></td>
			
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('project/detail/'.$project->project_id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> Detail
					</a>
					 
					<a href="<?php echo site_url('project/cetak/'.$project->project_id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> Cetak
					</a> 
					
					<a href="<?php echo site_url('project/edit/'.$project->project_id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> Edit
					</a>
					
					<a href="<?php echo site_url('project/delete/'.$project->project_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> Hapus
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
	
</table>

