<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divCiudad">
<?php echo select_tag('cadefcenaco[codciu]', options_for_select(Occiudad::getCiudades($cadefcenaco->getCodpai(), $cadefcenaco->getCodedo()),$cadefcenaco->getCodciu(),'include_custom=Seleccione'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipio',
    'url'      => 'caregcenaco/ajax?ajax=3',
    'with' => "'pais='+document.getElementById('cadefcenaco_codpai').value+'&estado='+document.getElementById('cadefcenaco_codedo').value+'&codigo='+this.value"
  ))));?>
</div>