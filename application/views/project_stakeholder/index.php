<p>
	<a href="<?php echo site_url('project_stakeholder/tambah') ?>" class="btn btn-success">
        <i class = "fa fa-plus"></i> Tambah Data Project Stakeholder
	</a>
	<a href ="<?php echo site_url('project_stakeholder/cetak_seluruh/') ?>" class = "btn btn-success btn-lm" target="_blank">
		<i class="fa fa-print"></i> Cetak Seluruh Data Stakeholder</a>
</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "30%">PROJECT</th>
			<th width = "25%">STAKEHOLDER</th>
			<th width = "10%">ROLE</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($project_stakeholder as $key => $project_stakeholder) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo site_url('project_stakeholder/project/'.$project_stakeholder->project_id) ?>">
				<?php echo $project_stakeholder->project_id ?>- <?php echo $project_stakeholder->project_name ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			
			<td><?php echo $project_stakeholder->stakeholder_id ?>- <?php echo $project_stakeholder->stakeholder_name ?>
			</td>

			<td><?php echo $project_stakeholder->stakeholder_role ?></td>
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('project_stakeholder/detail/'.$project_stakeholder->id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> Detail
					</a>
					
					<a href="<?php echo site_url('project_stakeholder/cetak/'.$project_stakeholder->id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> Cetak
					</a>

					<a href="<?php echo site_url('project_stakeholder/edit/'.$project_stakeholder->id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> Edit
					</a>
					
					<a href="<?php echo site_url('project_stakeholder/delete/'.$project_stakeholder->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> Hapus
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>