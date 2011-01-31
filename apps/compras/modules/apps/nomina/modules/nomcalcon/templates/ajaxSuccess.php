<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
// echo grid_tag($obj);
if ($cond=='1')
{
	 $value = select_tag('idconceptos',$objlist,array (
	  'control_name' => 'conceptos',
	  'multiple' => false,
	  'size' => 5,
	  'style' => 'width:300px',
	  'onDblClick'=> "javascript:CargarFormula(this.id)"
	  /*'onclick'=> remote_function(array(
	        'url'      => 'tesmoslib/ajax',
	         'script'   => true,
	        'complete' => 'AjaxJSON(request, json)',
	          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

	        ))*/
	)); echo $value ? $value : '&nbsp;';
}
if ($cond=='2')
{
	$value = select_tag('idmovimientos',$objlist,array (
  'control_name' => 'movimientos',
  'multiple' => false,
  'size' => 5,
  'style' => 'width:300px',
  'onDblClick'=> "javascript:CargarFormula(this.id)"
  /*'onclick'=> remote_function(array(
        'url'      => 'tesmoslib/ajax',
         'script'   => true,
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

        ))*/
)); echo $value ? $value : '&nbsp;';

}
if ($cond=='3')
{
	 $value = select_tag('idhistoricos',$objlist2,array (
		  'control_name' => 'historicos',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;';
}
if ($cond=='4')
{
       $value = select_tag('idvariables',$variables,array (
		  'control_name' => 'variables',
		  'multiple' => false,
		  'size' => 5,
		  'style' => 'width:300px',
		  'onDblClick'=> "javascript:CargarFormula(this.id)"
		  /*'onclick'=> remote_function(array(
		        'url'      => 'tesmoslib/ajax',
		         'script'   => true,
		        'complete' => 'AjaxJSON(request, json)',
		          'with' => "'ajax=1&cajtexmos=nrocta&cajtexcom=nomban&codigo='+this.value",

		        ))*/
		)); echo $value ? $value : '&nbsp;';
}

?>
