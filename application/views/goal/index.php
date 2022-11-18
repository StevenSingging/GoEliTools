<?php
if($this->session->flashdata('alert')){
?>

<script type="text/javascript">
    alert("Data ini masih digunakan");
</script>

<?php
}unset($_SESSION['alert']);
?>
<p>
	<a href="<?php echo site_url('goal/tambah') ?>" class="btn btn-success">
        <i class = "fa fa-plus"></i> Tambah Goal/Fitur
	</a>
</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "1%">NO</th>
			<th width = "15%">PROJECT</th>
			<th width = "10%">STAKEHOLDER</th>
			<th width = "6%">ID</th>
			<th width = "33%">GOAL/FITUR DESCRIPTION</th>
			<th width = "5%">TYPE</th>
			<th width = "11%">PARENT GOAL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($goal1 as $key => $goal) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><a href="<?php echo site_url('goal/project/'.$goal->project_id) ?>">
				<?php echo $goal->project_id ?> - <?php echo substr($goal->project_name, 0, 13) . "..." ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><a href="<?php echo site_url('goal/stakeholder/'.$goal->stakeholder_id) ?>">
				<?php echo $goal->stakeholder_id ?>- <?php echo $goal->stakeholder_name ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><?php echo $goal->goal_id ?> </td>
			<td><?php echo substr($goal->goal_desc, 0, 45) . "..." ?></td>
			<td><?php echo $goal->goal_type ?></td>
			<td><?php echo $goal->parent_goal_id ?></td>
			<td class="text-center">
				<div class="btn_group">
					<a href="<?php echo site_url('goal/detail/'.$goal->goal_id) ?>" style="width:40px" class="btn btn-info btn-sm" title="Detail">
						<i class="fa fa-laptop"></i>
					</a>
					
					<a href="<?php echo site_url('goal/cetak/'.$goal->goal_id) ?>" style="width:40px" class="btn btn-success btn-sm" target="_blank" title="Cetak">
						<i class="fa fa-print"></i>
					</a>

					<a href="<?php echo site_url('goal/edit/'.$goal->goal_id) ?>" style="width:40px" class="btn btn-warning btn-sm" title="Ubah">
						<i class="fa fa-edit"></i>
					</a>
					
					<a href="<?php echo site_url('goal/delete/'.$goal->goal_id) ?>" style="width:40px" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')" title="Hapus">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>
