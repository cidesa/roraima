<?php
/*
 * Created on 14/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
echo Catalogo($attipayu,1,array(
  'getprincipal' => 'getCodpre',
  'getsecundario' => 'getNompre',
  'campoprincipal' => 'codpre',
  'camposecundario'=> 'nompre',
  'campobase' => 'idcodpre',
  ), 'Cpdeftit_Acitipayu', 'cpdeftit', '' );

?>

