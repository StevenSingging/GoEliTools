<p>
	<a href="<?php echo site_url('procedure/tambah') ?>" class="btn btn-success">
        <i class = "fa fa-plus"></i> Tambah Prosedur
	</a>
</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "1%">NO</th>
			<th width = "4%">ID</th>
			<th width = "25%">PROCEDURE DESCRIPTION</th>
			<th width = "25%">ACTIVITIES ID & DESC</th>
			<th width = "22%">PROCEDURE ACTOR-RESOURCES</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($procedure as $key => $procedure) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $procedure->procedure_id ?> </td>
			<td><?php echo $procedure->procedure_desc ?> </td>

			<td><a href="<?php echo site_url('procedure/activities/'.$procedure->activities_id) ?>">
				<?php echo $procedure->activities_id ?> - <?php echo substr($procedure->activities_desc, 0, 35) . "..." ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>

			<td><?php echo $procedure->actor ?> - <?php echo $procedure->resources ?> </td>
			<td class="text-center">
				<div class="btn_group">
					<a href="<?php echo site_url('procedure/detail/'.$procedure->procedure_id) ?>" style="width:40px" class="btn btn-info btn-sm" title="Detail">
						<i class="fa fa-laptop"></i> 
					</a>
					
					<a href="<?php echo site_url('procedure/cetak/'.$procedure->procedure_id) ?>" style="width:40px" class="btn btn-success btn-sm" target="_blank" title="Cetak">
						<i class="fa fa-print"></i> 
					</a>

					<a href="<?php echo site_url('procedure/edit/'.$procedure->procedure_id) ?>" style="width:40px" class="btn btn-warning btn-sm" title="Ubah">
						<i class="fa fa-edit"></i> 
					</a>
					
					<a href="<?php echo site_url('procedure/delete/'.$procedure->procedure_id) ?>" style="width:40px" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')" title="Hapus">
						<i class="fa fa-trash"></i> 
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>