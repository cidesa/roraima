<?php
/*
 * Created on 12/02/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>

  <?php $value = object_select_tag($atsolici, 'getAtestadosId', array (
  'related_class' => 'Atestados',
  'control_name' => 'atsolici[atestados_id]',
  'onchange' => 'toAjaxUpdater(\'divmunicipios\',1,getUrlModulo()+\'ajax\',this.value,\'\',\'\')',
  'include_blank' => true,
)); echo $value ? $value : '&nbsp;' ?>