<?php
// open form
//echo form_open(base_url('stakeholder',' class="form-horizontal"'));
echo form_open(site_url('stakeholder'));
?>

<p>
	<button type="button"  class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-default">
            <i class= "fa fa-plus"> </i> Tambah Stakeholder Baru
    </button>
    <a href ="<?php echo site_url('stakeholder/cetak_seluruh/') ?>" class = "btn btn-success btn-lg" target="_blank">
		<i class="fa fa-print"></i> Cetak Seluruh Data Stakeholder</a>
</p>

<?php

include('tambah.php');
echo form_close();
?>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">ID</th>
			<th width = "25%">STAKEHOLDER NAME</th>
			<th width = "10%">TYPE</th>
			<th width = "25%">STAKEHOLDER COMPETENCE</th>
			<th width = "25%">ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($stakeholder as $key => $stakeholder) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $stakeholder->stakeholder_id ?></td>
			<td><?php echo $stakeholder->stakeholder_name ?> </td>
			<td><?php echo $stakeholder->stakeholder_type ?> </td>
			<td><?php echo $stakeholder->stakeholder_competence ?></td>

			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('stakeholder/detail/'.$stakeholder->stakeholder_id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> Detail
					</a>
					 
					<a href="<?php echo site_url('stakeholder/cetak/'.$stakeholder->stakeholder_id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> Cetak
					</a> 
					
					<a href="<?php echo site_url('stakeholder/edit/'.$stakeholder->stakeholder_id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> Edit
					</a>
					
					<a href="<?php echo site_url('stakeholder/delete/'.$stakeholder->stakeholder_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> Hapus
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
	
</table>

