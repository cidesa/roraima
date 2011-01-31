<?php
/*
 * Created on 11/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($nphispre,1,array(
  'getprincipal' => 'getCodemp',
  'getsecundario' => 'getNomemp',
  'campoprincipal' => 'codemp',
  'camposecundario' => 'nomemp',
  'campobase' => 'id',
  ), 'Nphispre_Nomperhispre', 'nphojint', '' , ''); ?>

