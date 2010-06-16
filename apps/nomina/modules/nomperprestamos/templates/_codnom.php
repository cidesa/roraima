<?php
/*
 * Created on 13/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
   $ajaxparams="+'&codcon='+$('nptippre_codcon').value";
?>
<?php echo Catalogo($nptippre,1,array(
  'getprincipal' => 'getCodnom',
  'getsecundario' => 'getNomnom',
  'campoprincipal' => 'codnom',
  'camposecundario' => 'nomnom',
  'campobase' => 'id',
  ), 'Npnomina_nomdefespvar', 'npnomina', '', $ajaxparams, 'divGrid' ); ?>