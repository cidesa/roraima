 <?php echo select_tag('contaba1[pereje]', options_for_select(Contaba1Peer::getPeriodos(),$contaba1->getPereje(),'include_custom=Seleccione..'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&codigo='+this.value"
      ))
  )) ?>
