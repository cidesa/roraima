<?php

?>

<?php use_helper('Object', 'Validation', 'Javascript') ?>



<?php if ($tipo=='E')
{
    echo select_tag('municipio', options_for_select($municipios,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'fordefproyecto/combo?par=2',
    'with' => "'estado='+$('estado').value+'&municipio='+this.value"
  ))));

}
else if ($tipo=='M')
{
	 echo select_tag('parroquia', options_for_select($parroquias,'','include_custom=Seleccione Uno'));
}
else if ($tipo=='P')
{
   echo select_tag('fordefpry[codsubobj]', options_for_select($subobjetivo,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divSubSubObjetivo',
		'url'      => 'fordefproyecto/combo?par=4',
		'with' => "'directriz='+$('fordefpry_codequ').value+'&subobjetivo='+this.value"
  ))));
}
else if ($tipo=='R')
{
   echo select_tag('fordefpry[codsubsubobj]', options_for_select($subsubobjetivo,'','include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
		'update'   => 'divOtro',
		'url'      => 'fordefproyecto/combo?par=3',
		'with' => "'directriz='+$('fordefpry_codequ').value+'&subobjetivo='+$('fordefpry_codsubobj').value+'&subsubobjetivo='+this.value"
  ))));
}
else if ($tipo=='T')
{
   echo select_tag('fordefpry[codsubsec]', options_for_select($subsector,'','include_custom=Seleccione Uno'));
}
