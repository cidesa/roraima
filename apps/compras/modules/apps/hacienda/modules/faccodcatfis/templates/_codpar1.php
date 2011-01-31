<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php
	echo  select_tag('fcdefnca[codpar1]',
	options_for_select(FcdefncaPeer::getLista_codpar(),$fcdefnca->getCodpar1(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
 //'update' => 'divGrid',
 'url'      => 'faccodcatfis/ajax',
 'complete' => 'AjaxJSON(request, json)',
 'with' => "'ajax=1&codigo='+this.value",
  ))));
?>