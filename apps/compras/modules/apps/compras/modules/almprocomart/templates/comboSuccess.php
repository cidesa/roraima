<?php

?>

<?php use_helper('Object', 'Validation', 'Javascript') ?>



<?php if ($tipo=='E')
{
    echo select_tag('municipio', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'almprocomart/combo?par=2',
    'with' => "'estado='+$('estado').value+'&municipio='+this.value"
  ))));

}
else if ($tipo=='M')
{
	 echo select_tag('parroquia', options_for_select($parroquias,'','include_custom=Seleccione Uno'));
}
