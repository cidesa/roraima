<?php
/**
 * Catalogo: Función que implementa el CatalogoHelper, el cual permite crear los objetos
 * que componen un catalogo en la vista. Estos objetos son una:
 * campo_código + Botón_Catalogo_datos + campo_descripción
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
function Catalogo($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '', $id = '0')
{
  $peer = $objeto->getPeer();
  $name = $peer->getOMClass();

  $name = explode('.',$name);
  //Para que funcione con lib.model.catastro.clase
  //sin perder lib.model.clase

  if (count($name)>3){   $name = strtolower($name[3]);  }else{   $name = strtolower($name[2]); }
  if($name=='npliquidaciondet') $name = 'npliquidacion_det';


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
   'script' => true,
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
   'script' => true,
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
   'script' => true,
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'condition' => "$('".$name.'_'.strtolower($oit['campoprincipal'])."').value != '' && $('".$name.'_'.strtolower($oit['campoprincipal'])."').readOnly==false ",
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
  'readonly' => true,
  'control_name' => $name.'['.strtolower($oit['camposecundario']).']',
)); echo $value ? $value : '&nbsp;';

  }
}


function CatalogoSimple($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '')
{
  $peer = $objeto->getPeer();
  $name = $peer->getOMClass();
  $name = explode('.',$name);

  //Para que funcione con lib.model.catastro.clase
  //sin perder lib.model.clase
  if (count($name)>3){   $name = strtolower($name[3]);  }else{   $name = strtolower($name[2]); }

if ($div==''){
  $value = object_input_tag($objeto, $oit['getprincipal'] , array (
  'size' => $oit['tamanoprincipal'],
  'control_name' => $name.'['.strtolower($oit['campoprincipal']).']',
  'onBlur'=> remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'script' => true,
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
   'script' => true,
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