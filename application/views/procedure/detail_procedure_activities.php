

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "5%">PROCEDURE ID</th>
			<th width = "30%">PROCEDURE DESCRIPTION</th>
			<th width = "20%">ACTIVITIES ID & DESC</th>
			<th width = "15%">PROCEDURE ACTOR-RESOURCES</th>
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
				<?php echo $procedure->activities_id ?>- <?php echo $procedure->activities_desc ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>

			<td><?php echo $procedure->actor ?> - <?php echo $procedure->resources ?> </td>
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('procedure/detail/'.$procedure->procedure_id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> 
					</a>
					
					<a href="<?php echo site_url('procedure/cetak/'.$procedure->procedure_id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> 
					</a>

					<a href="<?php echo site_url('procedure/edit/'.$procedure->procedure_id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> 
					</a>
					
					<a href="<?php echo site_url('procedure/delete/'.$procedure->procedure_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> 
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>