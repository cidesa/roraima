<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo input_hidden_tag('cajocuaux','') ?>
<?php echo input_hidden_tag('controlador','') ?>
<?php echo input_hidden_tag('tiempo','') ?>


<?php
echo Catalogo($npnomina,1,array(
  'getprincipal' => 'getCodnomesp',
  'getsecundario' => 'getDesnomesp',
  'campoprincipal' => 'codnomesp',
  'camposecundario' => 'desnomesp',
  'campobase' => 'id',
  ), 'Npnomesptipos_Nomespcalculo', 'npnomesptipos',''); // '', $ajaxparams, 'divProgram' si acaso lleva param


?>