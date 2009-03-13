<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo javascript_include_tag('nomina/nomnomcalnom') ?>

<?php
  $catparams="/param1/'+$('npnomina_codnomesp').value+'";
  $ajaxparams="+'&codnomesp='+$('npnomina_codnomesp').value";
 ?>

<?php
echo Catalogo($npnomina,2,array(
  'getprincipal' => 'getCodnom',
  'getsecundario' => 'getNomnom',
  'campoprincipal' => 'codnom',
  'camposecundario' => 'nomnom',
  'campobase' => 'npnomesptipos',
  ), 'Npnomespnomtip_Nomespcalculo', 'Npnomespnomtip',$catparams,$ajaxparams); // '', $ajaxparams, 'divProgram' si acaso lleva param


?>

<input id="opsi" type="text" value="" style="display:none">