<?php
/*
 * Created on 28/06/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php if ($tipo=='P')
{
 echo select_tag('ocmunici[codedo]', options_for_select($estados,'','include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update'   => 'divCiudad',
 'url'      => 'oycdefdivmun/combo?par=2',
 'with' => "'pais='+document.getElementById('ocmunici_codpai').value+'&estado='+this.value"
  ))));
}
