

<table class="table table-bordered table striped table-sm" id="example1">
	<thead>
		<tr>
			<th width = "5%">NO</th>
			<th width = "5%">ID</th>
			<th width = "10%">PROCEDURE DETAIL NO</th>
			<th width = "30%">PROCEDURE DETAIL DESCRIPTION</th>
			<th width = "10%">PRE CONDITION</th>
			<th width = "10%">POST CONDITION</th>
			<th width = "10%">FORMULA</th>
			<th width = "10%">ACTOR-RESOURCES</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($procedure_detail as $key => $procedure_detail) { ?> 

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $procedure_detail->procedure_detail_id ?> </td>
			<td><?php echo $procedure_detail->procedure_detail_no ?> </td>
			<td><?php echo $procedure_detail->procedure_detail_desc ?> </td>
			<td><?php echo $procedure_detail->pre_condition ?> </td>
			<td><?php echo $procedure_detail->post_condition ?> </td>
			<td><?php echo $procedure_detail->formula ?> </td>
			<td><?php echo $procedure_detail->actor ?>-<?php echo $procedure_detail->resources ?> </td>
		</tr>

		<?php } ?>

	</tbody>
</table>