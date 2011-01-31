<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php echo select_tag('cadefcenaco[codpai]', options_for_select(Ocpais::getEstados(),$cadefcenaco->getCodpai(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divEstado',
    'url'      => 'caregcenaco/ajax?ajax=1',
    'with' => "'codigo='+this.value"
  ))));?>