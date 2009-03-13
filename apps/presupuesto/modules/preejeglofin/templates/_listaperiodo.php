<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php
	echo  select_tag('cpdeftit[listaperiodo]',
	options_for_select(Cpdeftit::Listaperiodo(),$cpdeftit->getListaperiodo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
 'update' => 'divGrid',
 'url'      => 'preejeglofin/ajax',
 'complete' => 'AjaxJSON(request, json)',
 'with' => "'ajax=1&codigo='+this.value+'&codpre='+$('cpdeftit_codpre').value",
  ))));
?>

