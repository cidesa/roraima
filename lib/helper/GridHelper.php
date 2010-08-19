<?php
/**
 * Grid Tag: Función que genera el grid de datos version 1 que usa roraima en sus formularios.
 * El grid es generado en base a un arreglo con la configuración y los datos que debe
 * mostrar
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: GridHelper.php 35247 2009-12-02 23:06:40Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
function grid_tag($obj,$objelim = array())
{
  $name=$obj["name"];
  $filas=$obj["filas"];
  $cabeza=$obj["cabeza"];
  $eliminar=$obj["eliminar"];
  $titulos=$obj["titulos"];
  $ancho=$obj["ancho"];
  $alignf=$obj["alignf"];
  $alignt=$obj["alignt"];
  $campos=$obj["campos"];
  $catalogos=$obj["catalogos"];
  $ajax=$obj["ajax"];
  $montos=$obj["montos"];
  $filatotal=$obj["filatotal"];
  $totales=$obj["totales"];
  $html=$obj["html"];
  $js=$obj["js"];
  $datos=$obj["datos"];
  $vacia=$obj["vacia"];
  $oculta=$obj["oculta"];
  $cuantos2=count($montos);
  $tiposobj= $obj["tiposobj"];
  $combo= $obj["combo"];
  $checkbox= $obj["checkbox"];
  $boton = $obj["boton"];
  $default = $obj["default"];
  $funcionajax = $obj["funcionajax"];
  $jseliminar = $obj["jseliminar"];

  $modulo = sfContext::getInstance()->getModuleName();

  if(sfContext::getInstance()->getRequest()->getMethod() == sfRequest::POST && sfContext::getInstance()->getRequest()->isXmlHttpRequest()==false){

    if(sfContext::getInstance()->getUser()->hasAttribute('grid_'.$name,'cidesa/forms/'.$modulo)){
      $grid_en_sesion = sfContext::getInstance()->getUser()->getAttributeHolder()->get('grid_'.$name,null,'cidesa/forms/'.$modulo);
      if($grid_en_sesion){
        $datos = $grid_en_sesion[0];
        $objelim = $grid_en_sesion[1];
      }
    }
  }

  use_helper('PopUp','Javascript','Object','SubmitClick', 'Linktoapp');
  /////////////
  // Estilos //
  /////////////
  $tagsrc='
  <style type="text/css">
    .gridint_'.$name.' {
      color: #00000;
      width: '.$ancho.'px;
      height: 260px;
      background-color: #FFFFFF;
    }
  </style>
  '.javascript_include_tag('tools', 'dFilter', 'grid');
  /////////////////
  // Inicio Grid //
  /////////////////
  $tag = ' <h2 class="h2">'.$cabeza.'</h2><fieldset id="sf_fieldset_none" class="">
  <legend id="grid_'.$name.'"></legend>
  <div class="form-row">
  <div class="gridout" id="gridout">
  <table border="0" cellpad="0" cellspace="0" class="sf_admin_list" width="100%">
       <tr valign="bottom" bgcolor="#ECEBE6">
           <td>
        <div class="gridint_'.$name.'" id="gridint_'.$name.'">

               <table cellpad="0" cellspace="0" border="0" class="sf_admin_list" width="100%">
               <thead><tr>';
  //////////////////////////////////////////////////////////////
  // Filas Eliminadas (para mantener estado luego del submit) //
  //////////////////////////////////////////////////////////////
  $val_elim = '';
  if(is_array($objelim)){
    foreach($objelim as $elim){

      try{
        if(is_object($elim)){
          $getid = $elim->getId();
        }else{
          $getid = $elim[0];
        }
        $val_elim .= $getid.'-';
      }catch(Exception $ex){

      }

    }
  }
  ///////////////////////////////////
  // Boton para eliminar registros //
  ///////////////////////////////////
  if ($eliminar)
  {
    $tag .= '<th width="" align="center"></th>';
  }
  $i=0;
  $tagciclo1='';
  //'.$anchos[$i].'
  //print_r($tiposobj);
  while ($i<count($titulos))
  {
    if (!$oculta[$i]) {
      $tagfila = '<th width="400px" align="center" class="grid_titulo">'.$titulos[$i].'</th>';
    }
    else {
      $tagfila ='';
    }
    $tagciclo1=$tagciclo1.$tagfila;
    $i++;
  }

  $tagb =  '</tr></thead>';

  /////////////////////
  // Cuerpo del Grid //
  /////////////////////
  $i=0;
  $contdatos=count($datos);
  $filas=$contdatos+$filas;
  $tagciclo2='';

  if($name!='a') $functioneliminar = 'eliminar_'.$name; else $functioneliminar = 'eliminar';
  if($name!='a') $functionentermonto = 'entermonto_'.$name; else $functionentermonto = 'entermonto';
  if($name!='a') $functionactualizarsaldos = 'actualizarsaldos_'.$name; else $functionactualizarsaldos = 'actualizarsaldos';

  while ($i<$contdatos){

    $tagf = '<tr height="15">';
    if ($eliminar) {
      $tagf=$tagf.'<td class="grid_fila" align="center" height="15"><input readonly=true style="border:none" class="imagenborrar" name="'.$name.'x_'.$i.'_0" id="'.$name.'x_'.$i.'_0" size="1" onClick="'.$functioneliminar.'('.$i.','.count($campos).'); '.$jseliminar.';"></td>';
    }

    $j=0;
    $acumtagw='';
    while ($j<count($campos)) {
      $jmasuno=$j+1;
      $campo=$campos[$j];
      //////////
      // Ajax //
      //////////
      if ($ajax[$j]!="") {
        $aj=split("-",$ajax[$j]);
        $mos=$name.substr($aj[1],0,1)."_".$i."_".substr($aj[1],1,strlen($aj[1]));
        $com=$name.substr($aj[2],0,1)."_".$i."_".substr($aj[2],1,strlen($aj[2]));
        $for=$aj[3];
        $blur="onBlur=".chr(34).
        remote_function(array(
            "url"      => "$for/ajax",
            "condition" => "$('$com').value!=''",
            "complete" => "AjaxJSON(request, json)",
              "with" => "'ajax=$aj[0]&cajtexmos=$mos&cajtexcom=$com&codigo='+this.value")).chr(34);
      }else {
         $blur='';
      }
      ///////////////
      // Catalogos //
      ///////////////
      if ($catalogos[$j][0]!="") {
        $clase = $catalogos[$j][0];
        $frame = $catalogos[$j][1];
        $metodo = $catalogos[$j][2];
        $params = $catalogos[$j][3];

        $url = cross_app_link_to('herramientas','catalogo').'/clase/'.$clase.'/frame/'.$frame;
        if($metodo<>'') $url .= '/metodo/'.$metodo;

         if(is_array($catalogos[$j][3])){
           $p = 0;
          foreach($catalogos[$j][3] as $key => $obj){
            if(!is_numeric($key)){
              $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$key;
              $p++;
            }else{
              $miclase = ucfirst(strtolower($clase));
              $objmetodo = new $miclase();

              if(is_callable(array($objmetodo,$campos[$obj-1]),true)){
                $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$campos[$obj-1];
                $p++;
              }
            }
          }
         }else {
           $url .= '/obj1/'.$name.'x_'.$i.'_'.$jmasuno.'/campo'.$p.'/'.$campos[$j];
       }


       if(isset($catalogos[$j][4])){
       if(count($catalogos[$j][4])>0)
       {
         $p = 0;
          foreach($catalogos[$j][4] as $key => $param){
            $p++;
            $url .= '/param'.($p).'/'.$param;
          }
       }}
         //       print '$url='.$url.'
         //';
       $catobj=button_to_popup('...',$url,'','','imagencatgrid ','','','popup_'.$name.'_'.$i.'_'.$jmasuno);

      }else {
        $catobj='';
      }

      ///////////
      // Boton //
      ///////////
      $btnobj = '';
      if($boton[$j] != ''){
        $btnobj = button_tag_click('...',$boton[$j],array('name' => $name.'b_'.$i.'_'.$jmasuno, 'html' => 'id="'.$name.'b_'.$i.'_'.$jmasuno.'"'));
      }else $btnobj = '';

      ///////////////////////////////////////////////
      // Obteniendo datos a mostrar ($get, $getid) //
      ///////////////////////////////////////////////
      if (trim($campo)!="") {
        //if (!$vacia[$j]) {
        if(!is_array($datos[$i])){
          $metodo = 'get'.$campo;
          switch ($tiposobj[$j]){
            case 'f':
              $get = $datos[$i]->$metodo('Y-m-d');
              if($get == '31-12-1969') $get = '';
              break;
            case 'm':
              $get = $datos[$i]->$metodo(true);
              break;
            default:
              $get = $datos[$i]->$metodo();
          } // switch
          $getid = $datos[$i]->getId();
        }else{
          if(array_key_exists(strtolower($campo),$datos[$i])){

            switch ($tiposobj[$j]){

              case 'f':
                $marcatiempo = adodb_strtotime($datos[$i][strtolower($campo)]);
                $get = @adodb_date('Y-m-d',$marcatiempo);
                if($get == '31-12-1969') $get = '';
                break;
              case 'm':
                $get = $datos[$i][strtolower($campo)];
                break;
              default:
                $get = $datos[$i][strtolower($campo)];
            }
          }
          else {
            switch ($tiposobj[$j]){
              case 'f':
                $get = date('Y-m-d');
                break;
              case 'm':
                $get = '0,00';
                break;
              default:
                $get = 'No encontrado';
            }
          }
          $getid = $datos[$i]['id'];
        }
      }else {
        $get="";
        if(!is_array($datos[$i])){
          $getid = $datos[$i]->getId();
        }else{
          $getid = $datos[$i]['id'];
        }
      }

      if ($j==0) {
        $tagId ='<input type="hidden" id="'.$name.'x'.$i.'id" name="'.$name.'x'.$i.'id" value="'.$getid.'" '.$blur.'>';
      }else {
        $tagId = '';
      }
       //////////////////////////////////////////////////////////////////////////////////////////
       // Se crean los diferentes objetos para los diferentes tipos de datos a usar en el grid //
      //////////////////////////////////////////////////////////////////////////////////////////
       if (!$oculta[$j]) {
         if(is_array($html[$j])) $taghtml = implode(" ", $html[$j]);
         else  $taghtml = $html[$j];
         switch ($tiposobj[$j]){
           case 'f':
             $tagw ='     <td class="grid_fila" align="left" height="10">';

             $tagw .= input_date_tag($name.'x_'.$i.'_'.$jmasuno, $get, array (
                'rich' => true,
                            'maxlength' => 10,
                'calendar_button_img' => '/sf/sf_admin/images/date.png',
                             'onkeyup' => "javascript: mascara(this,'/',patron,true)",
                            'style' => 'border:none',
                            'class' => 'grid_txtleft',
                            'onblur' => $blur.' '.$js[$j],
             ),$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 't':
             $tagw = '     <td class="grid_fila" align="left" height="15">';
             $tagw .= input_tag($name.'x_'.$i.'_'.$jmasuno,$get, 'style="border:none" class="grid_txtleft" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'a':
             $tagw = '     <td class="grid_fila" align="left" height="15">';
             $tagw .= textarea_tag($name.'x_'.$i.'_'.$jmasuno,$get, 'style="border:none" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'm':
             $tagw = '     <td class="grid_fila" align="right" height="15">';
             $tagw .= input_tag($name.'x_'.$i.'_'.$jmasuno,$get, 'style="border:none" class="grid_txtright" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'c':
             $tagw = '     <td class="grid_fila" >';
             $tagw .= select_tag($name.'x_'.$i.'_'.$jmasuno, options_for_select($combo[$j],$get,'include_custom=Seleccione...'), 'style="border:none" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'k':
             $tagw = '     <td class="grid_fila" align="center" height="15">';
             $tagw .= checkbox_tag($name.'x_'.$i.'_'.$jmasuno, 1,(bool)$get, 'style="border:none" class="grid_txtcenter" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
         }
       }else {
         $tagw ='<input type="hidden" name="'.$name.'x_'.$i.'_'.$jmasuno.'" id="'.$name.'x_'.$i.'_'.$jmasuno.'" '.$js[$j].' value="'.$get.'" >';
       }
       $catobj = '';
       $btnobj = '';
       //}
      $acumtagw = $acumtagw.$tagw;
      $j++;
    } // while

    $tagf2=        '</tr>';

    if(!strpos($getid,$val_elim.'ZZ')) $tagciclo2 .= $tagf.$acumtagw.$tagf2;
    $i++;
  } // while

  ////////////////////////
  // Resto de las Filas //
  ////////////////////////

  //print_r($tiposobj);

  $tagciclo3='';
  $catobj = '';
  while ($i<$filas) {
    $tagf =  '<tr height="15">';

    if ($eliminar) {
      $tagf=$tagf.'<td class="grid_fila" align="center" height="15"><input style="border:none" class="imagenborrar" name="x_'.$i.'_0" id="x'.$i.'0" size="1" onClick="'.$functioneliminar.'('.$i.','.count($campos).'); '.$jseliminar.';"></td>';
    }

    $j=0;
    $acumtagw='';
    while ($j<count($campos)) {
      $jmasuno=$j+1;
      $campo=$campos[$j];

      //////////
      // Ajax //
      //////////
      if ($ajax[$j]!="") {
        $aj=split("-",$ajax[$j]);
        $mos=$name.substr($aj[1],0,1).'_'.$i.'_'.substr($aj[1],1,strlen($aj[1]));
        $com=$name.substr($aj[2],0,1).'_'.$i.'_'.substr($aj[2],1,strlen($aj[2]));
        $for=$aj[3];
        $blur="onBlur=".chr(34).
        remote_function(array(
          "url"      => "$for/ajax",
          "condition" => "$('$com').value!=''",
          "complete" => "AjaxJSON(request, json); ".$funcionajax[$j],
            "with" => "'ajax=$aj[0]&cajtexmos=$mos&cajtexcom=$com&codigo='+this.value")).chr(34);
      }else {
        $blur='';
      }
      ///////////////
      // Catalogos //
      ///////////////
      if ($catalogos[$j][0]!="") {
        $clase = $catalogos[$j][0];
        $frame = $catalogos[$j][1];
        $metodo = $catalogos[$j][2];
        $params = $catalogos[$j][3];

        $url = cross_app_link_to('herramientas','catalogo').'/clase/'.$clase.'/frame/'.$frame;
        if($metodo<>'') $url .= '/metodo/'.$metodo;

         if(is_array($catalogos[$j][3])){
           $p = 0;
          foreach($catalogos[$j][3] as $key => $obj){
            if(!is_numeric($key)){
              $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$key;
              $p++;
            }else{
              $miclase = ucfirst(strtolower($clase));
              $objmetodo = new $miclase();

              if(is_callable(array($objmetodo,$campos[$obj-1]),true)){
                $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$campos[$obj-1];
                $p++;
              }
            }
          }
         }else {
           $url .= '/obj1/'.$name.'x_'.$i.'_'.$jmasuno.'/campo'.$p.'/'.$campos[$j];
       }

       if(isset($catalogos[$j][4])){
       if(count($catalogos[$j][4])>0)
       {
         $p = 0;
          foreach($catalogos[$j][4] as $key => $param){
            $p++;
            $url .= '/param'.($p).'/'.$param;
          }
       }}
         //       print '$url='.$url.'
         //';
       $catobj=button_to_popup('...',$url,'','','imagencatgrid ','','','popup_'.$name.'_'.$i.'_'.$jmasuno);
      }else {
        $catobj='';
      }

      $btnobj = '';
      if($boton[$j] != ''){
        $btnobj = button_tag_click('...',$boton[$j],array('name' => $name.'b_'.$i.'_'.$jmasuno, 'html' => 'id="'.$name.'b_'.$i.'_'.$jmasuno.'"'));
      }else $btnobj = '';


      if ($j==0) {
        $tagId ='<input type="hidden" id="'.$name.'x'.$i.'id" name="'.$name.'x'.$i.'id" value="">';
      }else {
        $tagId = '';
      }

      //////////////////////////////////////////////////////////////////////////////////////////
       // Se crean los diferentes objetos para los diferentes tipos de datos a usar en el grid //
      //////////////////////////////////////////////////////////////////////////////////////////

      //print 'TipoObj='.$tiposobj[$j].'--$j='.$j.'>>';
       if (!$oculta[$j]) {
         if(is_array($html[$j])) $taghtml = implode(" ", $html[$j]);
         else  $taghtml = $html[$j];

         switch ($tiposobj[$j]){
           case 'f':
             $tagw ='     <td class="grid_fila" align="left" height="10">';
             if($vacia[$j]) $fecha = '';
             else $fecha = date('Y-m-d');
             $tagw .= input_date_tag($name.'x_'.$i.'_'.$jmasuno, $fecha, array (
                'rich' => true,
                'maxlength' => 10,
                'calendar_button_img' => '/sf/sf_admin/images/date.png',
                'onkeyup' => "javascript: mascara(this,'/',patron,true)",
                'style' => 'border:none',
                'class' => 'grid_txtleft ',
                'onblur' => $blur.' '.$js[$j],
             ),$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 't':
             $tagw = '     <td class="grid_fila" align="left" height="15">';
             $tagw .= input_tag($name.'x_'.$i.'_'.$jmasuno,$default[$j], 'style="border:none" class="grid_txtleft" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'a':
             $tagw = '     <td class="grid_fila" align="left" height="15">';
             $tagw .= textarea_tag($name.'x_'.$i.'_'.$jmasuno,$default[$j], 'style="border:none" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'm':
             $tagw = '     <td class="grid_fila" align="right" height="15">';
             $tagw .= input_tag($name.'x_'.$i.'_'.$jmasuno,$default[$j], 'style="border:none" class="grid_txtright" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'c':
             $tagw = '     <td class="grid_fila" >';
             $tagw .= select_tag($name.'x_'.$i.'_'.$jmasuno, options_for_select($combo[$j],'','include_custom=Seleccione...'), 'style="border:none" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'k':
             $tagw = '     <td class="grid_fila" align="center" height="15">';
             $tagw .= checkbox_tag($name.'x_'.$i.'_'.$jmasuno, 1,(bool)$checkbox[$j], 'style="border:none" class="grid_txtcenter" '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
         }
       }else {
         $tagw ='<input type="hidden" name="'.$name.'x_'.$i.'_'.$jmasuno.'" id="'.$name.'x_'.$i.'_'.$jmasuno.'" '.$js[$j].' value="'.$default[$j].'" > ';
       }
       $catobj = '';
       $btnobj = '';
      //}
      $acumtagw = $acumtagw.$tagw.$catobj.$btnobj;
      $j++;
    } // While

    $tagf2=        '</tr>';

    $tagciclo3=$tagciclo3.$tagf.$acumtagw.$tagf2;
    $i++;
  } // While

  /////////////////////////////
  // Fin del armado del grid //
  /////////////////////////////



  $tag2='                 </table>
                   </div>
               </td>
            </tr>
            <tr>
              '.$filatotal.'
            </tr>
      </table>
    </div>
        </div>
      <input type="hidden" id="'.$name.'_txtidborrar" name="'.$name.'_txtidborrar" value="'.$val_elim.'">
      </fieldset>';
//          '<div>'.button_tag_click('Nueva Fila',array('name' => $name.'b_'.$i.'_'.$jmasuno, 'html' => 'id="'.$name.'b_'.$i.'_'.$jmasuno.'"'));.'</div>';

  ////////////////////////////////////////////////
  // Inicio de la generación de los JavaScripts //
  ////////////////////////////////////////////////
  $tagentermonto='
        '.$functionentermonto.' = function(e,id)
        {
          //alert(e.keyCode);
          if (e.keyCode==13)
          {
            if (validarnumero(id)==true)
            {

              '.$functionactualizarsaldos.'();
            }
            else
            {
              document.getElementById(id).value=?0,00?;
              document.getElementById(id).focus();
              document.getElementById(id).select();

            }
          }

        }
        ';
  $tagentermonto = javascript_tag($tagentermonto);

  $tagactsal1 = '
          '.$functionactualizarsaldos.' = function()
          {
            i=0;
            var acum1=0;
            var acum2=0;
            var acum3=0;
            var acum4=0;
            var acum5=0;
            var acum6=0;
            var acum7=0;
            var acum8=0;
            var acum9=0;
            var acum10=0;
            var acum11=0;
            var acum12=0;
            var acum13=0;
            var acum14=0;
            var acum15=0;
            var acum16=0;
            var acum17=0;
            var acum18=0;
            var acum19=0;
            var acum20=0;
            var acum21=0;
            var acum22=0;
            var acum23=0;
            var acum24=0;
            var acum25=0;
            var acum26=0;
            var acum27=0;
            var acum28=0;
            var acum29=0;
            var acum30=0;

            var cuantos=parseFloat("'.$filas.'");

            while (i<cuantos)
            {
              ';
  $tagactsalciclo="";
  $j=0;
  while ($j<$cuantos2) {
    $tagactw='      var '.$name.'x'.$montos[$j].'="'.$name.'"+"x_"+i+"_"+'.$montos[$j].';

                if ( (document.getElementById('.$name.'x'.$montos[$j].').value==" ") || (document.getElementById('.$name.'x'.$montos[$j].').value=="") || (document.getElementById('.$name.'x'.$montos[$j].').value=="NaN"))
                {
                  document.getElementById('.$name.'x'.$montos[$j].').value="0,00";
                }
                str'.$montos[$j].'= document.getElementById('.$name.'x'.$montos[$j].').value.toString();
                  if(ValidarNumeroV2Float('.$name.'x'.$montos[$j].'))
                    elnum = parseFloat(str'.$montos[$j].');
      else
        if(ValidarNumeroV2VE('.$name.'x'.$montos[$j].'))
          elnum = FloatVEtoFloat(str'.$montos[$j].');
        else
                      elnum = 0.00;
                var num'.$montos[$j].'= elnum;

                acum'.$montos[$j].'=acum'.$montos[$j].'+num'.$montos[$j].';
                //FORMAT(PUNTO,COMA,PUNTO)
               var valor1=document.getElementById('.$name.'x'.$montos[$j].').value.split(",");
               var valor2=document.getElementById('.$name.'x'.$montos[$j].').value.split(".");
               var aux1=valor1.length;
               var aux2=valor2.length;
                if (aux1>1)
                 {
                 var tiene=valor1;
                 var pos=aux1;
                 }
                else
                {
                	var tiene=valor2;
                    var pos=aux2;
                }

                if (tiene[pos-1].length<=2)
                {
                  document.getElementById('.$name.'x'.$montos[$j].').value=FloattoFloatVE(num'.$montos[$j].');

                }
                else
                {
                	document.getElementById('.$name.'x'.$montos[$j].').value=FloattoFloatVEd(num'.$montos[$j].',tiene[pos-1].length);

                }
               ';
    if ($totales[$j]!="") {
      $tagactw2='
                try{
                  document.getElementById('."'".$totales[$j]."'".').value="";
                  document.getElementById('."'".$totales[$j]."'".').value=FloattoFloatVE(redondear(acum'.$montos[$j].',2));
                }catch (e){}
                ';
    }else {
      $tagactw2='';
    }
    ///////////////////
    $j=$j+1;
    $tagactsalciclo=$tagactsalciclo.$tagactw.$tagactw2;
  }

  $tagactsal2='    i=i+1;
            }
           }
          ';

  $tagactsal = $tagactsal1.$tagactsalciclo.$tagactsal2;

  $tagactsal = javascript_tag($tagactsal);

  $tageliminar='

    '.$functioneliminar.' = function(i,c)
      {

      // guardamos el id a borrar
      var id = "'.$name.'"+"x"+i+"id";
      var aux = "'.$name.'_txtidborrar";
      if (document.getElementById(id).value!="") //chekeamos q sea no sea una fila nueva
      {
        if (document.getElementById(aux).value=="") //PARA Q NO LE PONGA RAYITA
        {
          document.getElementById(aux).value=document.getElementById(id).value;
        }
        else
        {
          document.getElementById(aux).value=document.getElementById(aux).value + "-" + document.getElementById(id).value;
        }

        document.getElementById(id).value="";
      }
      ////////////////////////////

      var fila;' .
      'var x = "";' .
      'var xid = "";' .
      'var y = "";' .
      'var yid = "";' .
      '
      for (fila=i;fila<'.$filas.'-1;fila++)
      {' .
          'fila2=parseInt(fila)+1;
        for (col=1;col<=c;col++)
        {
          x="'.$name.'"+"x_"+fila+"_"+col;
          y="'.$name.'"+"x_"+fila2+"_"+col;' .
              '
          document.getElementById(x).value=document.getElementById(y).value;
          document.getElementById(y).value="";
        }' .
        'xid = "'.$name.'"+"x"+fila+"id";' .
        'yid = "'.$name.'"+"x"+fila2+"id";' .
        'document.getElementById(xid).value=document.getElementById(yid).value;
        document.getElementById(yid).value="";
      }
      //ultima fila
      if (i=='.$filas.'-1)
      {
        for (col=1;col<=c;col++)
        {
          var x="'.$name.'"+"x_"+i+"_"+col;
          document.getElementById(x).value="";
        }

      }
     '.$functionactualizarsaldos.'();
     }
    ';

  $tageliminar = javascript_tag($tageliminar);


  $tagactsal = str_replace("?","'",$tagactsal);
  $tagentermonto = str_replace("?","'",$tagentermonto);
  $tagciclo2 = str_replace("?","'",$tagciclo2);
  //$tagciclo2 = str_replace("*","?",$tagciclo2);
  $tagciclo3 = str_replace("?","'",$tagciclo3);
  //$tagciclo3 = str_replace("*","?",$tagciclo3);

  $scriptActSal = '
      <script type="text/javascript">
        '.$functionactualizarsaldos.'();
      </script>';


  $tagt=$tagsrc.$tagactsal.$tag.$tagciclo1.$tagb.$tagciclo2.$tagciclo3.$tag2.$tagentermonto.$tageliminar.$scriptActSal;


  return $tagt;
}

/**
 * Grid Tag V2: Función que genera el grid de datos version 2 que usa roraima en sus formularios.
 * El grid es generado en base a un arreglo con la configuración y los datos que debe
 * mostrar.
 * Este grid es el recomendado para los formularios nuevos, ya no se le está dado soporte al gridv1
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: GridHelper.php 35247 2009-12-02 23:06:40Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
function grid_tag_v2($obj,$objelim = array())
{
  $anchogrid = '800';
  $name      = $obj["name"];
  $filas     = $obj["filas"];
  $filas_vacias=$obj["filas"];
  $cabeza     = $obj["cabeza"];
  $eliminar   = $obj["eliminar"];
  $titulos    = $obj["titulos"];
  $ancho      = $obj["ancho"];
  $anchogrid  = $obj["anchogrid"];
  $alignf     = $obj["alignf"];
  $alignt     = $obj["alignt"];
  $campos     = $obj["campos"];
  $catalogos  = $obj["catalogos"];
  $ajax       = $obj["ajax"];
  $montos     = $obj["montos"];
  $filatotal  = $obj["filatotal"];
  $totales    = $obj["totales"];
  $html       = $obj["html"];
  $js         = $obj["js"];
  $datos      = $obj["datos"];
  $vacia      = $obj["vacia"];
  $oculta     = $obj["oculta"];
  $cuantos2   = count($montos);
  $tiposobj   = $obj["tiposobj"];
  $combo      = $obj["combo"];
  $checkbox   = $obj["checkbox"];
  $boton      = $obj["boton"];
  $default    = $obj["default"];
  $funcionajax= $obj["funcionajax"];
  $jseliminar = $obj["jseliminar"];
  $ajaxfila   = $obj["ajaxfila"];
  $ajaxcolumna= $obj["ajaxcolumna"];
  $ajaxgrid   = $obj["ajaxgrid"];
  $ajaxadicionales = $obj["ajaxadicionales"];
  $tabla      = $obj["tabla"];

  $jsfilas = array();
  $jsobjs = array();

  $modulo = sfContext::getInstance()->getModuleName();

  if(sfContext::getInstance()->getRequest()->getMethod() == sfRequest::POST && sfContext::getInstance()->getRequest()->isXmlHttpRequest()==false){


    if(sfContext::getInstance()->getUser()->hasAttribute('grid_'.$name,'cidesa/forms/'.$modulo)){
      $grid_en_sesion = sfContext::getInstance()->getUser()->getAttributeHolder()->get('grid_'.$name,null,'cidesa/forms/'.$modulo);
      if($grid_en_sesion){
        $datos = $grid_en_sesion[0];
        $objelim = $grid_en_sesion[1];
      }
    }
  }

  use_helper('PopUp','Javascript','Object','SubmitClick', 'Linktoapp');
  /////////////
  // Estilos //
  /////////////
  $tagsrc='
  <style type="text/css">
    .gridint_'.$name.' {
      color: #00000;
      width: '.$ancho.'px;
      height: 260px;
      background-color: #FFFFFF;
    }
  </style>
  '.javascript_include_tag('tools', 'dFilter', 'grid', 'numberformat');
  /////////////////
  // Inicio Grid //
  /////////////////
  $tag = ' <fieldset id="sf_fieldset_none" class="">
  <h2>'.$cabeza.'</h2>
  <div class="form-row">
  <div class="gridout" style="width:'.$anchogrid.'px !important;" id="gridout">
  <table border="0" cellpad="0" cellspace="0" class="sf_admin_list" width="100%">
       <tr valign="bottom" bgcolor="#ECEBE6">
           <td>
        <div class="gridint_'.$name.'" id="gridint_'.$name.'">

               <table cellpad="0" cellspace="0" border="0" class="sf_admin_list" width="100%" id="tabla_'.$name.'" name="tabla_'.$name.'">
               <thead><tr>';
  //////////////////////////////////////////////////////////////
  // Filas Eliminadas (para mantener estado luego del submit) //
  //////////////////////////////////////////////////////////////
  $val_elim = '';
  if(is_array($objelim)){
    foreach($objelim as $elim){

      try{
        if(is_object($elim)){
          $getid = $elim->getId();
        }else{
          $getid = $elim[0];
        }
        $val_elim .= $getid.'-';
      }catch(Exception $ex){

      }

    }
  }
  ///////////////////////////////////
  // Boton para eliminar registros //
  ///////////////////////////////////
  if ($eliminar)
  {
    $tag .= '<th width="" align="center"></th>';
  }
  $i=0;
  $tagciclo1='';

  //'.$anchos[$i].'
  //print_r($tiposobj);
  while ($i<count($titulos))
  {
    if (!$oculta[$i]) {
      $tagfila = '<th width="400px" align="center" class="grid_titulo grid_'.$name.'_col">'.$titulos[$i].'</th>';
    }
    else {
      $tagfila ='';
    }
    $tagciclo1=$tagciclo1.$tagfila;
    $i++;
  }

  $tagb =  '</tr></thead><tbody>';

   ///////////////////////////////////
  // Generar el Arreglo de Totales para el boton eliminar//
  ///////////////////////////////////
  $campostotales = '';
  for($g=0;$g<count($totales);$g++){
    $campostotales .= $totales[$g];
    if($g!=(count($totales)-1)) $campostotales .= ",";
  }

  /////////////////////
  // Cuerpo del Grid //
  /////////////////////
  $i=0;
  $contdatos=count($datos);
  $filas=$contdatos+$filas;
  $tagciclo2='';

  if($name!='a') $functioneliminar = 'eliminar_'.$name; else $functioneliminar = 'eliminar';
  if($name!='a') $functionentermonto = 'entermonto_'.$name; else $functionentermonto = 'entermonto';
  if($name!='a') $functionactualizarsaldos = 'actualizarsaldos_'.$name; else $functionactualizarsaldos = 'actualizarsaldos';

  while ($i<$contdatos){

    $tagf = '<tr class="'.$name.'f '.$name.'f'.$i.'" height="15">';
    if ($eliminar) {
      $tagf .= '<td class="grid_fila" align="center" height="15"><input readonly=true style="border:none" class="imagenborrar" name="'.$name.'x_'.$i.'_0" id="'.$name.'x_'.$i.'_0" size="1" ';
      $tagf .= ' onClick="';
      $tagf .= " EliminarFilaGrid('$name',$i,'$campostotales');";
      $tagf .= '" '.$jseliminar.' ></td>';
    }

    $jsfilas[$i] = array();
    $j=0;
    $acumtagw='';
    $ajaxadic = '';
    while ($j<count($campos)) {
      $jmasuno=$j+1;
      $campo=$campos[$j];
      $camposadic = $ajaxadicionales[$j];
      //////////
      // Ajax //
      //////////
      $modulo = sfContext::getInstance()->getRequest()->getParameter('module');

      $ajaxadic = '';
      for($g=0;$g<count($camposadic);$g++){
        $ajaxadic .= "'$camposadic[$g]'";
        if($g!=(count($camposadic)-1)) $ajaxadic .= ",";
      }

      if ($ajax[$j]!="") {
        $aj=split("-",$ajax[$j]);
        $mos=$name.substr($aj[1],0,1)."_".$i."_".substr($aj[1],1,strlen($aj[1]));
        $com=$name.substr($aj[2],0,1)."_".$i."_".substr($aj[2],1,strlen($aj[2]));
        $for=$aj[3];
        $blur=" accionAjax('".url_for($for.'/ajax')."','$funcionajax[$j]','$aj[0]','$mos','$com',this.value); ";
      }elseif($ajaxfila[$j]) {
         $blur=" accionRemotaGrid('".url_for($modulo.'/ajaxfila')."','".$name."','fila','".$i."',new Array(".$ajaxadic."),this); ";
      }elseif($ajaxcolumna[$j]) {
         $blur=" accionRemotaGrid('".url_for($modulo.'/ajaxcolumna')."','".$name."','columna','".($j+1)."',new Array(".$ajaxadic."),this); ";
      }elseif($ajaxgrid[$j]) {
         $blur=" accionRemotaGrid('".url_for($modulo.'/ajaxgrid')."','".$name."','grid','0',new Array(".$ajaxadic."),this); ";
      }else $blur="";

      //print 'onBlur='.$blur;

      ///////////////
      // Catalogos //
      ///////////////
      if ($catalogos[$j][0]!="") {
        $clase = $catalogos[$j][0];
        $frame = $catalogos[$j][1];
        $metodo = $catalogos[$j][2];
        $params = $catalogos[$j][3];

        $url = cross_app_link_to('herramientas','catalogo').'/clase/'.$clase.'/frame/'.$frame;
        if($metodo<>'') $url .= '/metodo/'.$metodo;

         if(is_array($catalogos[$j][3])){
           $p = 1;
          foreach($catalogos[$j][3] as $key => $obj){
            if(!is_numeric($key)){
              $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$key;
              $p++;
            }else{
              $miclase = ucfirst(strtolower($clase));
              $objmetodo = new $miclase();

              if(is_callable(array($objmetodo,$campos[$obj-1]),true)){
                $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$campos[$obj-1];
                $p++;
              }
            }
          }
         }else {
           $url .= '/obj1/'.$name.'x_'.$i.'_'.$jmasuno.'/campo'.$p.'/'.$campos[$j];
       }

       if(isset($catalogos[$j][4]) && is_array($catalogos[$j][4])){
       if(count($catalogos[$j][4])>0)
       {
          foreach($catalogos[$j][4] as $key => $param){
            $url .= '/'.($key).'/'.$param;
          }
       }}
         //       print '$url='.$url.'
         //';
       $catobj=button_to_popup('...',$url,'','','imagencatgrid ','','','popup_'.$name.'_'.$i.'_'.$jmasuno);

      }else {
        $catobj='';
      }

      ///////////
      // Boton //
      ///////////
      $btnobj = '';
      if($boton[$j] != ''){
        $btnobj = button_tag_click('...',$boton[$j],array('name' => $name.'b_'.$i.'_'.$jmasuno, 'html' => 'id="'.$name.'b_'.$i.'_'.$jmasuno.'"'));
      }else $btnobj = '';

      ///////////////////////////////////////////////
      // Obteniendo datos a mostrar ($get, $getid) //
      ///////////////////////////////////////////////
      if (trim($campo)!="") {
        //if (!$vacia[$j]) {
        if(!is_array($datos[$i])){
          $metodo = 'get'.$campo;
          switch ($tiposobj[$j]){
            case 'f':
              $get = $datos[$i]->$metodo('Y-m-d');
              break;
            case 'm':
              $get = $datos[$i]->$metodo(true);
              break;
            default:
              $get = $datos[$i]->$metodo();
          } // switch
          $getid = $datos[$i]->getId();
        }else{
          if(array_key_exists(strtolower($campo),$datos[$i])) $get = $datos[$i][strtolower($campo)];
          else {
            switch ($tiposobj[$j]){
              case 'f':
                $get = date('Y-m-d');
                break;
              case 'm':
                $get = '0,00';
                break;
              default:
                $get = 'No encontrado';
            }
          }
          $getid = $datos[$i]['id'];
        } // else
        /*}else{
        $get="";
        if(!is_array($datos[$i])){
        $getid = $datos[$i]->getId();
        }else{
        $getid = $datos[$i]['id'];
        }
        }*/
      }else {
        $get="";
        if(!is_array($datos[$i])){
          $getid = $datos[$i]->getId();
        }else{
          $getid = $datos[$i]['id'];
        }
      }

      if ((!$eliminar && $j==0) || ($eliminar && $j==1)) {
        $tagId ='<input type="hidden" id="'.$name.'x'.$i.'id" name="grid'.$name.'_fila'.$i.'_id" value="'.$getid.'" '.$blur.'>';
      }else {
        $tagId = '';
      }
       //////////////////////////////////////////////////////////////////////////////////////////
       // Se crean los diferentes objetos para los diferentes tipos de datos a usar en el grid //
      //////////////////////////////////////////////////////////////////////////////////////////
       if (!$oculta[$j]) {
         if(is_array($html[$j])) $taghtml = implode(" ", $html[$j]);
         else  $taghtml = $html[$j];
         switch ($tiposobj[$j]){
           case 'f':   //Fecha
             $tagw ='     <td class="grid_fila g_'.$name.'_f '.$name.'c'.$j.'" align="left" height="10">';

//echo $get." ";
//echo @adodb_date("Y-m-d",adodb_strtotime($get))."<br>";
			if ($get!=''){  $valor2 = @adodb_date("Y-m-d",adodb_strtotime($get)); }else{ $valor2 = ''; }

//echo $valor2." 555";
	//             $tagw .= input_date_tag($name.'x_'.$i.'_'.$jmasuno, @adodb_date("Y-m-d",adodb_strtotime($get)), array (

             $tagw .= input_date_tag($name.'x_'.$i.'_'.$jmasuno, $valor2, array (
                'name' => 'grid'.$name.'['.$i.']['.$j.']',
                'rich' => true,
                'maxlength' => 10,
                'calendar_button_img' => '/sf/sf_admin/images/date.png',
                'onkeyup' => "javascript: mascara(this,'/',patron,true)",
                'style' => 'border:none',
                'class' => 'grid_txtleft',
                'onblur' => $blur.' '.$js[$j],
             ),$taghtml.' ');
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 't':   //texto
             $tagw = '     <td class="grid_fila g_'.$name.'_t '.$name.'c'.$j.'" align="left" height="15">';
             $tagw .= input_tag($name.'x_'.$i.'_'.$jmasuno,$get, 'name="grid'.$name.'['.$i.']['.$j.']" style="border:none" class="grid_txtleft" onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'a':   //texto
             $tagw = '     <td class="grid_fila g_'.$name.'_t '.$name.'c'.$j.'" align="left" height="15">';
             $tagw .= textarea_tag($name.'x_'.$i.'_'.$jmasuno,$get, 'name="grid'.$name.'['.$i.']['.$j.']" style="border:none"  onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'm':   //Monto
             $tagw = '     <td class="grid_fila g_'.$name.'_m '.$name.'c'.$j.'" align="right" height="25">';
             $tagw .= input_tag($name.'x_'.$i.'_'.$jmasuno,$get, 'name="grid'.$name.'['.$i.']['.$j.']" style="border:none" class="grid_txtright" onBlur=" javascript: obj=this; ValidarMontoGridv2(obj); '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             $jsobjs[] = $name.'x_'.$i.'_'.$jmasuno;
             break;
           case 'c':  //Combo
             $tagw = '     <td class="grid_fila g_'.$name.'_c '.$name.'c'.$j.'" >';
             $tagw .= select_tag($name.'x_'.$i.'_'.$jmasuno, options_for_select( (is_array($combo[$j]) && $combo[$j]!='') ? $combo[$j] : eval($combo[$j]) ,$get,'include_custom=Seleccione...'), 'name="grid'.$name.'['.$i.']['.$j.']" style="border:none" onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'k':   //check
             $tagw = '     <td class="grid_fila g_'.$name.'_k '.$name.'c'.$j.'" align="center" height="15">';
             if ($get==""){
               $checked=false;
             }
             else{
               $checked=true;
             }
             $tagw .= checkbox_tag($name.'x_'.$i.'_'.$jmasuno,1,$checked, 'name="grid'.$name.'['.$i.']['.$j.']" style="border:none" class="grid_txtcenter" onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
         }
       }else {
         $tagw ='<input type="hidden" class="'.$name.'_ids '.$name.'c'.$j.'" name="grid'.$name.'['.$i.']['.$j.']" id="'.$name.'x_'.$i.'_'.$jmasuno.'" '.$js[$j].' value="'.$get.'" >';
       }
       $jsfilas[$i][] = $name.'x_'.$i.'_'.$jmasuno;
       if($tagId!='') $jsfilas[$i][] = $name.'x'.$i.'id';
       $catobj = '';
       $btnobj = '';

      $acumtagw = $acumtagw.$tagw;
      $j++;
    } // while

    $tagf2=        '</tr>';

    if(!strpos($getid,$val_elim.'ZZ')) $tagciclo2 .= $tagf.$acumtagw.$tagf2;
    $i++;
  } // while

  ////////////////////////
  // Resto de las Filas //
  ////////////////////////

  //print($jseliminar);
  $tagciclo3='';
  $catobj = '';
  $y = $filas;
  while ($i<$y) {
    $tagf =  '<tr class="'.$name.'f '.$name.'f'.$i.'?'.'" height="15">';

    if ($eliminar) {
      $tagf .= '<td class="grid_fila" align="center" height="15"><input readonly=true style="border:none" class="imagenborrar" name="'.$name.'x_'.$i.'?'.'_0" id="'.$name.'x_'.$i.'?'.'_0" size="1" ';
      $tagf .= ' onClick="';
      $tagf .= "EliminarFilaGrid('$name',$i".'?'.",'$campostotales');";
      $tagf .= $jseliminar.'" ></td>';
    }

    $j=0;
    $acumtagw='';
    while ($j<count($campos)) {
      $jmasuno=$j+1;
      $campo=$campos[$j];
      $camposadic = $ajaxadicionales[$j];
      //////////
      // Ajax //
      //////////
      $modulo = sfContext::getInstance()->getRequest()->getParameter('module');

      $ajaxadic = '';
      for($g=0;$g<count($camposadic);$g++){
        $ajaxadic .= "'$camposadic[$g]'";
        if($g!=(count($camposadic)-1)) $ajaxadic .= ",";
      }

      if ($ajax[$j]!="") {
        $aj=split("-",$ajax[$j]);
        $mos=$name.substr($aj[1],0,1)."_".$i.'?'."_".substr($aj[1],1,strlen($aj[1]));
        $com=$name.substr($aj[2],0,1)."_".$i.'?'."_".substr($aj[2],1,strlen($aj[2]));
        $for=$aj[3];
        $blur=" accionAjax('".url_for($for.'/ajax')."','$funcionajax[$j]','$aj[0]','$mos','$com',this.value); ";
      }elseif($ajaxfila[$j]) {
         $blur=" accionRemotaGrid('".url_for($modulo.'/ajaxfila')."','".$name."','fila','".$i.'?'."',new Array(".$ajaxadic."),this); ";
      }elseif($ajaxcolumna[$j]) {
         $blur=" accionRemotaGrid('".url_for($modulo.'/ajaxcolumna')."','".$name."','columna','".($j+1)."',new Array(".$ajaxadic."),this); ";
      }elseif($ajaxgrid[$j]) {
         $blur=" accionRemotaGrid('".url_for($modulo.'/ajaxgrid')."','".$name."','grid','0',new Array(".$ajaxadic."),this); ";
      }else $blur="";

      ///////////////
      // Catalogos //
      ///////////////
      if ($catalogos[$j][0]!="") {
        $clase = $catalogos[$j][0];
        $frame = $catalogos[$j][1];
        $metodo = $catalogos[$j][2];
        $params = $catalogos[$j][3];

        $url = cross_app_link_to('herramientas','catalogo').'/clase/'.$clase.'/frame/'.$frame;
        if($metodo<>'') $url .= '/metodo/'.$metodo;

         if(is_array($catalogos[$j][3])){
           $p = 1;
          foreach($catalogos[$j][3] as $key => $obj){
            if(!is_numeric($key)){
              $url .= '/obj'.($p).'/'.$name.'x_'.$i.'?'.'_'.$obj.'/campo'.$p.'/'.$key;
              $p++;
            }else{
              $miclase = ucfirst(strtolower($clase));
              $objmetodo = new $miclase();

              if(is_callable(array($objmetodo,$campos[$obj-1]),true)){
                $url .= '/obj'.($p).'/'.$name.'x_'.$i.'?'.'_'.$obj.'/campo'.$p.'/'.$campos[$obj-1];
                $p++;
              }
            }
          }
         }else {
           $url .= '/obj1/'.$name.'x_'.$i.'?'.'_'.$jmasuno.'/campo'.$p.'/'.$campos[$j];
       }

       if(isset($catalogos[$j][4]) && is_array($catalogos[$j][4])){
       if(count($catalogos[$j][4])>0)
       {
          foreach($catalogos[$j][4] as $key => $param){
            $url .= '/'.($key).'/'.$param;
          }
       }}

       $catobj=button_to_popup('...',$url,'','','imagencatgrid ','','','popup_'.$name.'_'.$i.'?'.'_'.$jmasuno);

      }else {
        $catobj='';
      }

      $btnobj = '';
      if($boton[$j] != ''){
        $btnobj = button_tag_click('...',$boton[$j],array('name' => $name.'b_'.$i.'?'.'_'.$jmasuno, 'html' => 'id="'.$name.'b_'.$i.'?'.'_'.$jmasuno.'"'));
      }else $btnobj = '';


      if ((!$eliminar && $j==0) || ($eliminar && $j==1)) {
        $tagId ='<input type="hidden" id="'.$name.'x'.$i.'?'.'id" name="grid'.$name.'_fila'.$i.'?'.'_id" value="">';
      }else {
        $tagId = '';
      }

      //////////////////////////////////////////////////////////////////////////////////////////
       // Se crean los diferentes objetos para los diferentes tipos de datos a usar en el grid //
      //////////////////////////////////////////////////////////////////////////////////////////

      //print 'TipoObj='.$tiposobj[$j].'--$j='.$j.'>>';
       if (!$oculta[$j]) {
         if(is_array($html[$j])) $taghtml = implode(" ", $html[$j]);
         else  $taghtml = $html[$j];

         switch ($tiposobj[$j]){
           case 'f':
             $tagw ='     <td class="grid_fila g_'.$name.'_f '.$name.'c'.$j.'?'.'" align="left" height="10">';
             if($vacia[$j]) $fecha = '';
             else $fecha = date('Y-m-d');
             $tagw .= input_date_tag($name.'x_'.$i.'?'.'_'.$jmasuno, $fecha, array (
                'name' => 'grid'.$name.'['.$i.'?'.']['.$j.']',
                'rich' => true,
                'maxlength' => 10,
                'calendar_button_img' => '/sf/sf_admin/images/date.png',
                'onkeyup' => "javascript: mascara(this,'/',patron,true)",
                'style' => 'border:none',
                'class' => 'grid_txtleft',
                'onblur' => $blur.' '.$js[$j],
             ),$taghtml.' ');
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 't':
             $tagw = '     <td class="grid_fila g_'.$name.'_t '.$name.'c'.$j.'" align="left" height="15">';
             $tagw .= input_tag($name.'x_'.$i.'?'.'_'.$jmasuno,$default[$j], 'name="grid'.$name.'['.$i.'?'.']['.$j.']" style="border:none" class="grid_txtleft" onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'a':
             $tagw = '     <td class="grid_fila g_'.$name.'_t '.$name.'c'.$j.'" align="left" height="15">';
             $tagw .= textarea_tag($name.'x_'.$i.'?'.'_'.$jmasuno,$default[$j], 'name="grid'.$name.'['.$i.'?'.']['.$j.']" style="border:none"  onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'm':
             $tagw = '     <td class="grid_fila g_'.$name.'_m '.$name.'c'.$j.'" align="right" height="25">';
             $tagw .= input_tag($name.'x_'.$i.'?'.'_'.$jmasuno,$default[$j], 'name="grid'.$name.'['.$i.'?'.']['.$j.']" style="border:none" class="grid_txtright" onBlur=" javascript: obj=this; ValidarMontoGridv2(obj); '.$blur.' '.$js[$j].' " '.$taghtml);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             $jsobjs[] = $name.'x_'.$i.'_'.$jmasuno;
             break;
           case 'c':
             $tagw = '     <td class="grid_fila g_'.$name.'_c '.$name.'c'.$j.'" >';
             $tagw .= select_tag($name.'x_'.$i.'?'.'_'.$jmasuno, options_for_select((is_array($combo[$j]) && $combo[$j]!='') ? $combo[$j] : call_user_func(array(ucfirst($tabla).'Peer', $combo[$j])),$default[$j],'include_custom=Seleccione...'), 'name="grid'.$name.'['.$i.'?'.']['.$j.']" style="border:none" onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml.' '.$js[$j].' '.$blur);
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
             break;
           case 'k':
              if ($default[$j]==""){
               $checked=false;
             }
             else{
               $checked=true;
             }
             $tagw = '     <td class="grid_fila g_'.$name.'_k '.$name.'c'.$j.'" align="center" height="15">';
             $tagw .= checkbox_tag($name.'x_'.$i.'?'.'_'.$jmasuno, 1,$checked, 'name="grid'.$name.'['.$i.'?'.']['.$j.']" style="border:none" class="grid_txtcenter" onBlur=" '.$blur.' '.$js[$j].' " '.$taghtml.' ');
             $tagw .= $catobj.$btnobj.$tagId.'</td>';
         }
       }else {
         $tagw ='<input type="hidden" class="'.$name.'_ids '.$name.'c'.$j.'" name="grid'.$name.'['.$i.'?'.']['.$j.']" id="'.$name.'x_'.$i.'?'.'_'.$jmasuno.'" '.$js[$j].' value="'.$default[$j].'" >';
       }
       $jsfilas[$i][] = $name.'x_'.$i.'_'.$jmasuno;
       if($tagId!='') $jsfilas[$i][] = $name.'x'.$i.'id';

       $catobj = '';
       $btnobj = '';
      //}
      $acumtagw = $acumtagw.$tagw.$catobj.$btnobj;
      $j++;
    } // While

    $tagf2=        '</tr>';


    $tagciclo3=$tagciclo3.$tagf.$acumtagw.$tagf2;
    $tagnuevo = str_replace($i.'?','INDEX',$tagf.$acumtagw.$tagf2);
    $tagciclo3 = str_replace($i.'?',$i,$tagciclo3);
    $i++;
  } // While



  /////////////////////////////
  // Fin del armado del grid //
  /////////////////////////////


  if($filas_vacias>0) $botonnuevafila = button_tag_click('      Nueva Fila',"NuevaFilaGrid('".$name."');",array('name' => $name.'_incluir', 'html' => "id='".$name."_incluir'", 'html' => "class=sf_admin_action_nueva_fila")).'  '.input_hidden_tag($name.'_nuevo', $tagnuevo);
  else $botonnuevafila = '';


  $tag2='                 </tbody></table>
                   </div>
               </td>
            </tr>
            <tr>
              '.$filatotal.'
            </tr>
      </table>
    </div>'.
            $botonnuevafila.
                '
        </div><input type="hidden" id="'.$name.'_idborrado" name="'.$name.'_idborrado" value="'.$val_elim.'">'.
      '</fieldset>';

  ////////////////////////////////////////////////
  // Inicio de la generación de los JavaScripts //
  ////////////////////////////////////////////////
//  $tagciclo2 = str_replace("?","'",$tagciclo2);
//  $tagciclo2 = str_replace("*","?",$tagciclo2);
//  $tagciclo3 = str_replace("?","'",$tagciclo3);
//  $tagciclo3 = str_replace("*","?",$tagciclo3);

  ///////////////////////////////////
  // Generar el Arreglo de Totales //
  ///////////////////////////////////
  $campostotales = '';
  for($g=0;$g<count($totales);$g++){
    $campostotales .= "'$totales[$g]'";
    if($g!=(count($totales)-1)) $campostotales .= ",";
  }
  $aj = false;
  foreach($ajax as $a)
  {
    if($a!='') $aj = true;
  }

  $ac = false;
  foreach($totales as $t)
  {
    if($t!='') $ac = true;
  }

  if(!$aj && !$ac) $acum = 'false';
  else $acum = 'true';

  //////////////////////////////////
  // Arreglos de Objetos del Grid //
  //////////////////////////////////
  $arrayfilas=array();
  $strarrayfilas=array();
  foreach($jsfilas as $fila){
    $arrayfilas[] = "Array("."'".implode("', '",$fila)."'".")";
  }
  $strarrayfilas = "Array(".implode(", ",$arrayfilas).")";

  $strarrayobjs = "Array("."'".implode("', '",$jsobjs)."'".")";


  ///////////////////////////////////////
  // JavaScripts de variables del Grid //
  ///////////////////////////////////////
  $scriptActSal = '
      <script type="text/javascript">
        var objs_montos_'.$name.' = '.$strarrayobjs.';
        var objs_filas_'.$name.' = null;
        var inputs_filas_'.$name.' = '.$strarrayfilas.';
        var inputs_cols_'.$name.' = null;
        var inputs_grid_'.$name.' = null;
        var ArrTotales_'.$name.' = new Array('.$campostotales.');
        var grid_acum_'.$name.'='.$acum.';

        Event.observe(window, "load",
          function() {
            ActualizarSaldosGrid("'.$name.'",ArrTotales_'.$name.');
          }
        );
      </script>';

  $tagt=$tagsrc.$tag.$tagciclo1.$tagb.$tagciclo2.$tagciclo3.$tag2.$scriptActSal;

  return $tagt;
}


?>

