<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divMunicipio">
<?php echo select_tag('cadefcenaco[codmun]', options_for_select(Ocmunici::getMunicipios($cadefcenaco->getCodpai(), $cadefcenaco->getCodedo(), $cadefcenaco->getCodciu()),$cadefcenaco->getCodmun(),'include_custom=Seleccione'),array());?>
</div>