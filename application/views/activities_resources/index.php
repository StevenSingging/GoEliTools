<p>
	<a href="<?php echo site_url('activities_resources/tambah') ?>" class="btn btn-success">
        <i class = "fa fa-plus"></i> Tambah Sumber Daya Aktivitas
	</a>
</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "5%">ID</th>
			<th width = "37%">ACTIVITIES ID - DESCRIPTION</th>
			<th width = "33%">ACTIVITIES ACTOR - RESOURCES</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($activities_resources as $key => $activities_resources) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $activities_resources->id ?> </td>
			<td><a href="<?php echo site_url('activities_resources/activities/'.$activities_resources->activities_id) ?>">
				<?php echo $activities_resources->activities_id ?>- <?php echo $activities_resources->activities_desc ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><?php echo $activities_resources->actor ?>-<?php echo $activities_resources->resources ?> </td>
			<td class="text-center">
				<div class="btn_group">
					<a href="<?php echo site_url('activities_resources/detail/'.$activities_resources->id) ?>" style="width:40px" class="btn btn-info btn-sm" title="Detail">
						<i class="fa fa-laptop"></i> 
					</a>
					
					<a href="<?php echo site_url('activities_resources/cetak/'.$activities_resources->id) ?>" style="width:40px" class="btn btn-success btn-sm" target="_blank" title="Cetak">
						<i class="fa fa-print"></i> 
					</a>

					<a href="<?php echo site_url('activities_resources/edit/'.$activities_resources->id) ?>" style="width:40px" class="btn btn-warning btn-sm" title="Ubah">
						<i class="fa fa-edit"></i> 
					</a>
					
					<a href="<?php echo site_url('activities_resources/delete/'.$activities_resources->id) ?>" style="width:40px" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')" title="Hapus">
						<i class="fa fa-trash"></i> 
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>