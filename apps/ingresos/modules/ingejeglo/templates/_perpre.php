<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>
<?php

  echo  select_tag('cideftit[perpre]',
    options_for_select(Constantes::ListaNumPeriodos2(),$cideftit->getPerpre()),array('onChange'=> remote_function(array(
   'update' => 'divGrid',
   'url'      => 'ingejeglo/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&codigo='+this.value+'&codpre='+$('cideftit_codpre').value",
  ))));
?>
