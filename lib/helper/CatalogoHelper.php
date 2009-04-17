<?php
/*
 * Created on 10/03/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php



function Catalogo($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '', $id = '0')
{
  $peer = $objeto->getPeer();
  $name = $peer->getOMClass();
  $name = explode('.',$name);
  $name = strtolower($name[2]);

  //Validaciones para el tamano de los campos
  if (!(array_key_exists('tamanoprincipal',$oit)))
  {
    $oit['tamanoprincipal']=20;
  }

  if (!(array_key_exists('tamanosecundario',$oit)))
  {
    $oit['tamanosecundario']=40;
  }
  /////////

  if (($id==1) and ($objeto->getId()!='')){

      $value = object_input_tag($objeto, $oit['getprincipal'] , array (
      'size' => $oit['tamanoprincipal'],
      'readonly' => true,
      'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',

    )); echo $value ? $value : '&nbsp; ';
    echo '&nbsp;';

        echo object_input_hidden_tag($objeto, 'get'.H::getCampoModelo($oit['campobase']), array(
          'control_name' => $name.'['.strtolower($oit['campobase']).']',
        ));


      $value = object_input_tag($objeto, $oit['getsecundario'], array (
      'size' => $oit['tamanosecundario'],
      'disabled' => true,
      'control_name' => $name.'['.strtolower($oit['camposecundario']).']',
    )); echo $value ? $value : '&nbsp;';


  }else{


  if ($ajaxindex==0){
  $value = object_input_tag($objeto, $oit['getprincipal'] , array (
  'size' => $oit['tamanoprincipal'],
  'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',
  'onBlur'=> remote_function(array(
   'update' => $div,
   'url'      => sfContext::getInstance()->getModuleName().'/catalogo',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('".$name.'_'.strtolower($oit['campoprincipal'])."').value != ''",
   'with' => "'ajax=".$ajaxindex."&clase=".$clase."&name=".$name."&campobase=".$oit['campobase']."&camposecundario=".$oit['camposecundario']."&campoprincipal=".$oit['campoprincipal']."&codigo='+this.value"
      ))
)); echo $value ? $value : '&nbsp; ';
echo '&nbsp;';

  }
  else{

if ($div==''){
  $value = object_input_tag($objeto, $oit['getprincipal'] , array (
  'size' => $oit['tamanoprincipal'],
  'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',
  'onBlur'=> remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('".$name.'_'.strtolower($oit['campoprincipal'])."').value != ''",
   'with' => "'ajax=".$ajaxindex."&cajtexmos=".$name.'_'.strtolower($oit['camposecundario'])."&codigo='+this.value".$params_ajax
      ))
)); echo $value ? $value : '&nbsp;';

}
else {
  $value = object_input_tag($objeto, $oit['getprincipal'] , array (
  'size' => $oit['tamanoprincipal'],
  'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',
  'onBlur'=> remote_function(array(
   'update' => $div,
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('".$name.'_'.strtolower($oit['campoprincipal'])."').value != ''",
   'with' => "'ajax=".$ajaxindex."&cajtexmos=".$name.'_'.strtolower($oit['camposecundario'])."&codigo='+this.value".$params_ajax
      ))
)); echo $value ? $value : '&nbsp;';
}
echo '&nbsp;';
}
  $url = '/metodo/Caordcom_Almajuoc/clase/Caordcom/frame/sf_admin_edit_form/obj1/caajuoc_ordcom/obj2/caajuoc_desord/';

    echo object_input_hidden_tag($objeto, 'get'.H::getCampoModelo($oit['campobase']), array(
      'control_name' => $name.'['.strtolower($oit['campobase']).']',
    ));

    echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/frame/sf_admin_edit_form/metodo/'.$metodo.'/clase/'.$clase.'/obj1/'.$name.'_'.$oit['campoprincipal'].'/obj2/'.$name.'_'.$oit['camposecundario'].'/obj3/'.$name.'_'.$oit['campobase'].'/campo1/'.substr($oit['getprincipal'],3,strlen($oit['getprincipal'])).'/campo2/'.substr($oit['getsecundario'],3,strlen($oit['getsecundario'])).'/campo3/id/'.$uri_params,'','','botoncat');
echo '&nbsp;';

  $value = object_input_tag($objeto, $oit['getsecundario'], array (
  'size' => $oit['tamanosecundario'],
  'disabled' => true,
  'control_name' => $name.'['.strtolower($oit['camposecundario']).']',
)); echo $value ? $value : '&nbsp;';

  }
}


function CatalogoSimple($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '')
{
  $peer = $objeto->getPeer();
  $name = $peer->getOMClass();
  $name = explode('.',$name);
  $name = strtolower($name[2]);
if ($div==''){
  $value = object_input_tag($objeto, $oit['getprincipal'] , array (
  'size' => $oit['tamanoprincipal'],
  'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',
  'onBlur'=> remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('".$name.'_'.strtolower($oit['campoprincipal'])."').value != ''",
      ))
)); echo $value ? $value : '&nbsp;';
}
else {
  $value = object_input_tag($objeto, $oit['getprincipal'] , array (
  'size' => $oit['tamanoprincipal'],
  'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',
  'onBlur'=> remote_function(array(
   'update' => $div,
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('".$name.'_'.strtolower($oit['campoprincipal'])."').value != ''",
      ))
)); echo $value ? $value : '&nbsp;';
}
echo '&nbsp;';

  $url = '/metodo/Caordcom_Almajuoc/clase/Caordcom/frame/sf_admin_edit_form/obj1/caajuoc_ordcom/obj2/caajuoc_desord/';

    echo object_input_hidden_tag($objeto, 'get'.H::getCampoModelo($oit['campobase']), array(
      'control_name' => $name.'['.strtolower($oit['campobase']).']',
    ));

    echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/frame/sf_admin_edit_form/metodo/'.$metodo.'/clase/'.$clase.'/obj1/'.$name.'_'.$oit['campoprincipal'].'/obj2/'.$name.'_'.$oit['campobase'].'/campo1/'.$oit['campoprincipal'].'/campo2/id/'.$uri_params);

}

?>