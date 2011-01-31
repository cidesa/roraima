<?php
/*
 * Created on 11/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
   $ajaxparams="+'&codemp='+$('nphispre_codemp').value";
?>
<?php echo Catalogo($nphispre,2,array(
  'getprincipal' => 'getCodtippre',
  'getsecundario' => 'getDestippre',
  'campoprincipal' => 'codtippre',
  'camposecundario' => 'destippre',
  'campobase' => 'id',
  ), 'Nptippre_Nomperhispre', 'nptippre', '', $ajaxparams ); ?>

