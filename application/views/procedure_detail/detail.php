<p class="text-right">
	<a href ="<?php echo site_url('procedure_detail/edit/' .$procedure_detail->procedure_detail_id) ?>" class = "btn btn-success">
		<i class="fa fa-edit"></i> Edit Procedure_detail
	</a>

	<a href ="<?php echo site_url('procedure_detail/cetak/' .$procedure_detail->procedure_detail_id) ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-cetak"></i> Cetak 
	</a>

	<a href ="<?php echo site_url('procedure_detail') ?>" class = "btn btn-info">
		<i class="fa fa-edit"></i> kembali
	</a>
</p>
<hr>
<table class ="table table-striped">
	<thead>
		<tr>
			<th width="25%">Procedure detail ID</th>
			<th> : <?php echo $procedure_detail->procedure_detail_id ?></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Procedure ID</td>
			<td>: <?php echo $procedure_detail->procedure_id?></td>
		</tr>
		<tr>
			<td>Procedure Description</td>
			<td>: <?php echo $procedure->procedure_desc ?></td>
		</tr>
		<tr>
			<td>Procedure detail No</td>
			<td>: <?php echo $procedure_detail->procedure_detail_no ?></td>
		</tr>
		<tr>
			<td>Procedure detail Description</td>
			<td>: <?php echo $procedure_detail->procedure_detail_desc ?></td>
		</tr>
		<tr>
			<td>Pre-Condition</td>
			<td>: <?php echo $procedure_detail->pre_condition?></td>
		</tr>
		<tr>
			<td>Post-Condition</td>
			<td>: <?php echo $procedure_detail->post_condition?></td>
		</tr>
		<tr>
			<td>Formula/Rumus</td>
			<td>: <?php echo $procedure_detail->formula?></td>
		</tr>
		<tr>
			<td>Procedure_detail Actor</td>
			<td>: <?php echo $procedure_detail->actor ?></td>
		</tr>
		<tr>
			<td>Procedure_detail Resources</td>
			<td>: <?php echo $procedure_detail->resources ?></td>
		</tr>
	</tbody>
</table>

