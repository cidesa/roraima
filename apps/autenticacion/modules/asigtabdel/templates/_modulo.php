  <?php echo select_tag('apernueper[modulo]', options_for_select(Constantes::ListaModulos(),$apernueper->getModulo()),array(
  'onChange' => remote_function(array(
   'update' => 'nomtabla',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',   
   'with' => "'ajax=1&codigo='+this.value+'&concatenado='+$('apernueper_concatenado').value"
      ))
  )) ?>
