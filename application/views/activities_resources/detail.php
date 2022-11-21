<p class="text-right">
	<a href ="<?php echo site_url('activities_resources/edit/' .$activities_resources->id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Activities Resources
	</a>

	<a href ="<?php echo site_url('activities_resources/cetak/' .$activities_resources->id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('activities_resources') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">ID</th>
			<th> : <?php echo $activities_resources->id ?></th>
		</tr>
		<tr>
			<th width="25%">Activities ID</th>
			<th> : <?php echo $activities_resources->activities_id ?> - 
					<?php echo $activities->activities_desc ?></th>
		</tr>
		<tr>
			<th width="55%">Actor</th>
			<th> : <?php echo $activities_resources->actor ?></th>
		</tr>
		<tr>
			<th width="25%">Resources</th>
			<th> : <?php echo $activities_resources->resources ?></th>
		</tr>
	</thead>
</table>

