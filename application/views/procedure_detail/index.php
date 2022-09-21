<p>
	<a href="<?php echo site_url('procedure_detail/tambah') ?>" class="btn btn-success">
        <i class = "fa fa-plus"></i> Tambah Detail Prosedur
	</a>
</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "5%">ID</th>
			<th width = "30%">PROCEDURE ID - DESCRIPTION</th>
			<th width = "10%">PROCEDURE DETAIL NO</th>
			<th width = "30%">PROCEDURE DETAIL DESCRIPTION</th>
			
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($procedure_detail as $key => $procedure_detail) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $procedure_detail->procedure_detail_id ?> </td>
			<td><a href="<?php echo site_url('procedure_detail/procedure/'.$procedure_detail->procedure_id) ?>">
				<?php echo $procedure_detail->procedure_id ?>- <?php echo $procedure_detail->procedure_desc ?>
				<sup><i class="fa fa-link"></i></sup></a>
			</td>
			<td><?php echo $procedure_detail->procedure_detail_no ?> </td>
			<td><?php echo $procedure_detail->procedure_detail_desc ?> </td>
			<td>
				<div class="btn_group">
					<a href="<?php echo site_url('procedure_detail/detail/'.$procedure_detail->procedure_detail_id) ?>" class="btn btn-info btn-sm">
						<i class="fa fa-laptop"></i> 
					</a>
					
					<a href="<?php echo site_url('procedure_detail/cetak/'.$procedure_detail->procedure_detail_id) ?>" class="btn btn-success btn-sm" target="_blank">
						<i class="fa fa-print"></i> 
					</a>

					<a href="<?php echo site_url('procedure_detail/edit/'.$procedure_detail->procedure_detail_id) ?>" class="btn btn-warning btn-sm">
						<i class="fa fa-edit"></i> 
					</a>
					
					<a href="<?php echo site_url('procedure_detail/delete/'.$procedure_detail->procedure_detail_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini?')">
						<i class="fa fa-trash"></i> 
					</a>
				</div>
			</td>

		</tr>

		<?php } ?>

	</tbody>
</table>