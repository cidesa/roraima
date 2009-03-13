 <?php echo select_tag('fafactur[tipmon]', options_for_select(TsdesmonPeer::getMonedas(),$fafactur->getTipmon()),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=3&codigo='+this.value+'&monant='+$('fafactur_monedaanterior').value+'&fecha='+$('fafactur_fecfac').value"
      ))
  )) ?>
