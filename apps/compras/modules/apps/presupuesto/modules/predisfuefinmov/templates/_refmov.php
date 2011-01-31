<div id='divCatalogo'>

<?php  if($cpmovfuefin->getTipmov()=='P') { //Precompromiso  ?>
	<?php $value = get_partial ('refprc', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($cpmovfuefin->getTipmov()=='C') {  //Compromiso  ?>
	<?php $value = get_partial ('refcom', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($cpmovfuefin->getTipmov()=='CA') {  //Causado ?>
	<?php $value = get_partial ('refcau', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($cpmovfuefin->getTipmov()=='PA') {  //Pagado ?>
	<?php $value = get_partial ('refpag', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($cpmovfuefin->getTipmov()=='A') {  //Adicion / Disminucion ?>
	<?php $value = get_partial ('refadi', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($cpmovfuefin->getTipmov()=='T') {  //Traslado ?>
	<?php $value = get_partial ('reftra', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($cpmovfuefin->getTipmov()=='AJ') {  //Ajuste ?>
	<?php $value = get_partial ('refaju', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else{ ?>
<?php echo '<br>';
} ?>

</div>
