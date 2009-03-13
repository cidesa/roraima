<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php //echo javascript_include_tag('nomina/nomnomcalnom') ?>

<?php
  $catparams="/param1/'+$('npcestatickets_codnom').value+'";
  $ajaxparams="+'&codnom='+$('npcestatickets_codnom').value";
 ?>

<?php
echo Catalogo($npcestatickets,1,array(
  'getprincipal' => 'getCodcon',
  'getsecundario' => 'getNomcon',
  'campoprincipal' => 'codcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Nomdefespcestic_Npdefcpt', 'Npdefcpt',$catparams,$ajaxparams,'',1); // '', $ajaxparams, 'divProgram' si acaso lleva param
?>
