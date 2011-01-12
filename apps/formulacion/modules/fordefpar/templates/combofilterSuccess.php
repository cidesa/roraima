<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:comboSuccess.php 32813 2009-09-08 16:19:47Z lhernandez $
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript') ?>
<?php
echo select_tag('filters[codmun]', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'fordefpar/combo?par=2',
    'with' => "'estado='+document.getElementById('fordefpar_codest').value+'&municipio='+this.value"
  ))));?>
