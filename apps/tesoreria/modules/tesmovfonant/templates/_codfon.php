 <?php echo select_tag('tsfonant[codfon]', options_for_select(TsdeffonantPeer::getFondos(),$tsfonant->getCodfon(),'include_custom=Seleccione uno'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=5&codigo='+this.value"
      ))
  )) ?>
