<p>
	<a href="<?php echo site_url('activities/tambah') ?>" class="btn btn-success">
        <i class = "fa fa-plus"></i> Tambah Aktivitas
	</a>
</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "15%">PROJECT</th>
			<th width = "15%">STAKEHOLDER</th>
			<th width = "5%">ACTIVITIES ID</th>
			<th width = "30%">ACTIVITIES DESCRIPTION</th>
			<th width = "5%">PARENT ACTIVITIES</th>
			<th width = "5%">PARENT GOAL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($activities as $key => $activities) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo site_url('activities/project/'.$activities->project_id) ?>">
				<?php echo $activities->project_id ?>- <?php echo $activities->project_name ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><a href="<?php echo site_url('activities/stakeholder/'.$activities->stakeholder_id) ?>">
				<?php echo $activities->stakeholder_id ?>- <?php echo $activities->stakeholder_name ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><?php echo $activities->activities_id ?> </td>
			<td><?php echo $activities->activities_desc ?> </td>
			<td><?php echo $activities->parent_activities_id ?></td>
			<td><?php echo $activities->goal_id ?></td>
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('activities/detail/'.$activities->activities_id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> 
					</a>
					
					<a href="<?php echo site_url('activities/cetak/'.$activities->activities_id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> 
					</a>

					<a href="<?php echo site_url('activities/edit/'.$activities->activities_id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> 
					</a>
					
					<a href="<?php echo site_url('activities/delete/'.$activities->activities_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> 
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>