 <?php echo select_tag('cireging[codtipper]', options_for_select(CitipperPeer::getPersonas(),$cireging->getCodtipper(),'include_custom=Seleccione...'),array(
   )) ?>
