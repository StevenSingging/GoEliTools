

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "15%">ACTOR</th>
			<th width = "30%">RESOURCES</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($activities_resources as $key => $activities_resources) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $activities_resources->actor ?> </td>
			<td><?php echo $activities_resources->resources ?> </td>
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('activities_resources/detail/'.$activities->activities_id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> 
					</a>
					
					<a href="<?php echo site_url('activities_resources/cetak/'.$activities->activities_id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> 
					</a>

					<a href="<?php echo site_url('activities_resources/edit/'.$activities->activities_id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> 
					</a>
					
					<a href="<?php echo site_url('activities_resources/delete/'.$activities->activities_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> 
					</a>
				</div>
			</td>

		</tr>
		<?php } ?>
	</tbody>
</table>