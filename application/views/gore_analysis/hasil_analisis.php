<p>
<?php 
$fact_value=$hasilanalisis->fact_value;

		if ($fact_value == "T")
		{
			$ket = "FALSE/TIDAK TERPENUHI";
		}else{
			$ket = "TRUE/YA TERPENUHI";
		}
?>


<title><?php echo $title ?></title>
<h3><?php echo "GOAL UTAMA : ".$ket?></h3>
</p>

<p>
	<a href="<?php echo site_url('gore_analysis') ?>" class="btn btn-success">
        <i class = "fa fa-arrow-left"></i> Kembali
	</a>
</p>