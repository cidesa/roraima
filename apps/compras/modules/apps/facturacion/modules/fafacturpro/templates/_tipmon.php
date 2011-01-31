 <?php echo select_tag('fafacturpro[tipmon]', options_for_select(TsdesmonPeer::getMonedas(),$fafacturpro->getTipmon()),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=5&codigo='+this.value+'&monant='+$('fafacturpro_tipmon').value+'&fecha='+$('fafacturpro_fecfac').value"
      ))
  )) ?>
