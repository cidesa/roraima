<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divEstado">
<?php echo select_tag('cadefcenaco[codedo]', options_for_select(Ocestado::getEstados($cadefcenaco->getCodpai()),$cadefcenaco->getCodedo(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divCiudad',
    'url'      => 'caregcenaco/ajax?ajax=2',
    'with' => "'pais='+document.getElementById('cadefcenaco_codpai').value+'&codigo='+this.value"
  ))));?>
</div>