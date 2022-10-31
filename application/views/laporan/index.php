<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<?php echo form_open(site_url('laporan')) ?>
<div class="container">
    <h1>Data Goal</h1>
<table class="table table-bordered table striped table-sm" id="example">
	<thead>
		<tr>
			<th width = "1%">NO</th>
			<th width = "20%">STAKEHOLDER</th>
			<th width = "2%">JUMLAH DATA</th>	
		</tr>
	</thead>
	<tbody>
		<?php $x=0;foreach ($goal as $key => $val) { ?> 

		<tr>
			<td><?php echo $x+1; ?></td>
			<td><?php echo $val->stakeholder_name ?> </td>
			<td><?php echo $val->jumlah ?> </td>
		</tr>
		<?php $x++;} ?>

	</tbody>
</table>
</div>

<div class="container mt-5">
    <h1>Data Aktifitas</h1>
<table class="table table-bordered table striped table-sm" id="act1">
	<thead>
		<tr>
			<th width = "1%">NO</th>
			<th width = "20%">STAKEHOLDER</th>
			<th width = "2%">JUMLAH DATA</th>	
		</tr>
	</thead>
	<tbody>
		<?php $x=0;foreach ($activities as $key => $val) { ?> 

		<tr>
			<td><?php echo $x+1; ?></td>
			<td><?php echo $val->stakeholder_name ?> </td>
			<td><?php echo $val->jumlah ?> </td>
		</tr>
		<?php $x++;} ?>

	</tbody>
</table>
</div>

<div class="container mt-5">
    <h1>Data Prosedur</h1>
<table class="table table-bordered table striped table-sm" id="proc1">
	<thead>
		<tr>
			<th width = "1%">NO</th>
			<th width = "20%">STAKEHOLDER</th>
			<th width = "2%">JUMLAH DATA</th>	
		</tr>
	</thead>
	<tbody>
		<?php $x=0;foreach ($procedure as $key => $val) { ?> 

		<tr>
			<td><?php echo $x+1; ?></td>
			<td><?php echo $val->stakeholder_name ?> </td>
			<td><?php echo $val->jumlah ?> </td>
		</tr>
		<?php $x++;} ?>

	</tbody>
</table>
</div>
<script>
  $(function () {
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
	$('#act1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
	$('#proc1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
