<p>
	<a href="<?php echo site_url('gore_analysis') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
	<a href="<?php echo site_url('gore_analysis/cetak_hasil_inferensi') ?>" target="_blank" class="btn btn-success">
        <i class = "fa fa-print"></i> Cetak
	</a>
	<a href ="<?php echo site_url('gore_analysis/export_hasil_inferensi') ?>" class = "btn btn-primary" target="_blank">
		<i class="fa fa-word"></i> Export To Word 
	</a>


</p>

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "10%">PARENT CODE</th>
			<th width = "25%">PARENT DESCRIPTION</th>
			<th width = "25%">CHILD CODE </th>
			<th width = "10%">PARENT VALUE </th>
			
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($hasilinferensi as $key => $hasilinferensi) { ?> 

		<tr>
			<td><?php echo $key+1;?></td>
			<td><?php echo $hasilinferensi->parent_code ?></td>
			<td><?php echo $hasilinferensi->parent_desc ?></td>
			<td><?php echo $hasilinferensi->child_code ?></td>
			<td class="<?php if($hasilinferensi->fact_value =='Y') {echo 'bg-success';}else{echo 'bg-danger';} ?>"><?php echo $hasilinferensi->fact_value ?></td>

		</tr>

		<?php } ?>

	</tbody>
</table>

