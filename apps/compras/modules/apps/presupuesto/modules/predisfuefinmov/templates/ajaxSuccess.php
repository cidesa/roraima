<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>

<?php //$value = get_partial('mensaje', array('npnomesptipos' => $npnomesptipos, 'visible' => $visible)); echo $value ? $value : '&nbsp;' ?>

<?php  if($sf_params->get('codigo')=='P') { //Precompromiso  ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($sf_params->get('codigo')=='C') {  //Compromiso  ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($sf_params->get('codigo')=='CA') {  //Causado ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($sf_params->get('codigo')=='PA') {  //Pagado ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($sf_params->get('codigo')=='A') {  //Adicion / Disminucion ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($sf_params->get('codigo')=='T') {  //Traslado ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php }else if($sf_params->get('codigo')=='AJ') {  //Ajuste ?>
  <?php $value = get_partial ('refmov', array('cpmovfuefin' => $cpmovfuefin)); echo $value ? $value : '&nbsp';?>

<?php } //else{  ?>

<?  if ($sf_params->get('tipmov') and $cpmovfuefin->getObj())
  {
    echo grid_tag_v2($cpmovfuefin->getObj());
  }

  //Nacari
  ?>
